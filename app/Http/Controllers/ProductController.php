<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function products()
    {
        //query builder
        // $products = DB::table('products')->get();
        
        //eloquent
        // $products = Product::all();
        $products = Product::orderByDesc('id')->paginate(5);
        $trashed = Product::onlyTrashed()->orderByDesc('deleted_at')->paginate(5);
        return view('admin.products', compact('products','trashed'));
    }

    public function archives()
    {
        $trashed = Product::onlyTrashed()->with('user')->orderByDesc('deleted_at')->paginate(5);
        return view('admin.archives', compact('trashed'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        //validate the request
        $validated = $request->validate([
            'name' => ['required','min:3','max:255'],
            'description' => ['required','min:10','max:255'],
            'price' => ['required','numeric','min:0'],
            'image' => ['required','mimes:jpg,jpeg,png'],
        ],[
            'name.required' => 'Please input your product name',
            'name.min' => 'Product name must be at least 3 characters',
            'name.max' => 'Product name must not exceed 255 characters',
            'description.required' => 'Please input your product description',
            'price.required' => 'Please input your product price',
            'image.required' => 'Please upload an image',
            'image.mimes' => 'Image must be a file of type: jpg, jpeg, png.',
        ]);

        // get the file
        $image = $request->file('image');
        //generate image filename
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $upl_location='images/product/';
        //storing the image in directory
        $image->move($upl_location, $name_gen);
        $last_image = $upl_location.$name_gen;
       
        //insert into database using Eloquent
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $last_image,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // DB::table('products')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now(),
        // ]);


        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        //validate the request
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:products'],
            'description' => ['required','min:10','max:255'],
            'price' => ['required','numeric','min:0'],
        ],[
            'name.required' => 'Please input your product name',
            'name.min' => 'Product name must be at least 3 characters',
            'name.max' => 'Product name must not exceed 255 characters',
            'name.unique' => 'Product name already exists, please choose another name',
            'description.required' => 'Please input your product description',
            'price.required' => 'Please input your product price',
        ]);

        $old_img = $request->old_image;
        // get the file
        $image = $request->file('image');
        //generate image filename
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $upl_location='images/product/';
        //storing the image in directory
        $image->move($upl_location, $name_gen);
        $last_image = $upl_location.$name_gen;

        unlink($old_img);

        //update into database using Eloquent
        $product = Product::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $last_image,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function archive($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.products')->with('success', 'Product archived successfully.');
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('admin.products')->with('success', 'Product restored successfully.');
    }

    public function destroy($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product) {
            // attempt to delete the image file from public storage
            if (!empty($product->image)) {
                $imagePath = public_path($product->image);
                if (is_file($imagePath)) {
                    @unlink($imagePath);
                }
            }
            $product->forceDelete();
        }
        return redirect()->route('admin.products')->with('success', 'Product deleted permanently.');
    }
}
