<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#1a8dc3] font-montserrat">Edit Product</h2>
        </div>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-8 bg-[#f4f8ff]">
        <div class="max-w-7xl mx-auto space-y-6">

            {{-- Products form --}}
            <section class="bg-white rounded-xl shadow-xl p-6">
                <div>
                    <form class="max-w-sm mx-auto" action="{{ url('/admin/products/update/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Product Name --}}
                        <div class="mb-5">
                            <label for="name" class="block mb-2 mt-2 text-sm font-medium">Product</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                value="{{ $product->name }}"
                                class="text-sm p-2.5 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3] focus:border-[#1a8dc3]" 
                                placeholder="Enter Product name"
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- Description --}}
                        <div class="mb-5">
                            <label for="description" class="block mb-2 mt-2 text-sm font-medium">Description</label>
                            <input 
                                type="text" 
                                name="description" 
                                id="description" 
                                value="{{ $product->description }}"
                                class="text-sm p-2.5 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3] focus:border-[#1a8dc3]" 
                                placeholder="Enter Product description"
                            />
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div class="mb-5">
                            <label for="price" class="block mb-2 mt-2 text-sm font-medium">Price</label>
                            <input 
                                type="text" 
                                name="price" 
                                id="price" 
                                value="{{ $product->price }}"
                                class="text-sm p-2.5 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3] focus:border-[#1a8dc3]" 
                                placeholder="Enter Product price"
                            />
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-5">
                            <label for="image" class="block mb-2 mt-2 text-sm font-medium">Image</label>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover mb-2">
                            <input 
                                type="hidden" 
                                value="{{ $product->image }}" 
                                name="old_image"
                            />
                            <input 
                                type="file" 
                                name="image" 
                                id="image" 
                                value="{{ $product->image }}"
                                class="text-sm p-2.5 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3] focus:border-[#1a8dc3]" 
                            />
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        
                        {{-- Submit --}}
                        <button 
                            type="submit" 
                            class="block mx-auto mt-2 items-center px-4 py-1.5 bg-[#1a8dc3] text-white rounded-lg hover:bg-[#176fa1] transition shadow text-sm font-medium"
                        >
                            Update
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
