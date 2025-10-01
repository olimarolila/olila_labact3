<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return view('welcome');
});

//guest routes
Route::get('/browse', [GuestController::class,'browse'])->name('browse');
Route::get('/about', [GuestController::class,'about'])->name('about');
Route::get('/faq', [GuestController::class,'faq'])->name('faq');
Route::get('/feedback', [GuestController::class,'feedback'])->name('feedback');
Route::get('/events', [GuestController::class,'events'])->name('events');


Route::get('/error', function () {
    return view('error');
})->name('error');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
        
    //admin routes
    Route::middleware('check.role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
        
        Route::get('/admin/products', [ProductController::class, 'products'])->name('admin.products');
        Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/admin/products/update/{id}', [ProductController::class, 'update']);
        Route::get('/admin/products/delete/{id}', [ProductController::class, 'archive']);
        Route::get('/admin/products/restore/{id}', [ProductController::class, 'restore']);
        Route::get('/admin/products/destroy/{id}', [ProductController::class, 'destroy']);
        
    });
    
    //user routes
    Route::middleware('check.role:user')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        
        Route::get('/products', function () {
            return view('products');
        })->name('products');
        
        Route::get('/orders', function () {
            return view('orders');
        })->name('orders');
    });
    
});

// Route::get('/browse', function () {
//     return view('guest.browse');
// })->name('browse');

// Route::get('/about', function () {
//     return view('guest.about');
// })->name('about');

// Route::get('/faq', function () {
//     return view('guest.faq');
// })->name('faq');

// Route::get('/feedback', function () {
//     return view('guest.feedback');
// })->name('feedback');

// Route::get('/events', function () {
//     return view('guest.events');
// })->name('events');