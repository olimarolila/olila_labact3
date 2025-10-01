<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#1a8dc3] font-montserrat">Products</h2>
                <a href="#" 
                class="inline-flex items-center px-4 py-1.5 bg-[#1a8dc3] text-white rounded-lg 
                        hover:bg-[#176fa1] transition shadow text-sm font-medium">
                    + Add Product
                </a>
        </div>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-8 bg-[#f4f8ff]">
        <div class="max-w-7xl mx-auto space-y-6">
            {{-- Filters --}}
            <section class="bg-white rounded-xl shadow-xl p-6">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <div class="sm:col-span-2">
                        <label class="text-xs text-gray-500">Search</label>
                        <input type="text" placeholder="Search products..."
                               class="mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3] focus:border-[#1a8dc3]">
                    </div>
                    <div>
                        <label class="text-xs text-gray-500">Category</label>
                        <select class="mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3]">
                            <option>All</option>
                            <option>Rings</option>
                            <option>Necklaces</option>
                            <option>Bracelets</option>
                            <option>Earrings</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button class="w-full px-4 py-2 bg-[#1a8dc3] text-white rounded-lg hover:bg-[#176fa1] transition">Apply</button>
                    </div>
                </div>
            </section>

            {{-- Products table --}}
            <section class="bg-white rounded-xl shadow-xl p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-[#f4f8ff]">
                            <tr class="text-left text-gray-600">
                                <th class="px-4 py-3">Product</th>
                                <th class="px-4 py-3">Category</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Stock</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['Diamond Ring','Rings','₱5,990',12,'Active','https://iraq.zendiamond.com/216-060-ctblack-diamond-silver-man-ring-men-rings-zen-diamond-en-men-rings-zen-diamond-18481-21-B.jpg'],
                                ['Pearl Necklace','Necklaces','₱3,450',20,'Active','https://img4.dhresource.com/webp/m/0x0/f3/albu/jc/g/09/49b26bde-d3bd-4be8-bd44-14cce91acf8a.jpg'],
                                ['Gold Bracelet','Bracelets','₱4,250',3,'Low Stock','https://cdn.theograce.com/digital-asset/product/id-bracelet-for-men-with-gold-plating-16.jpg'],
                            ] as $p)
                                <tr class="hover:bg-[#f9fbff]">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $p[5] }}" alt="{{ $p[0] }}" class="w-10 h-10 rounded object-cover">
                                            <div>
                                                <div class="font-medium">{{ $p[0] }}</div>
                                                <div class="text-xs text-gray-500">SKU-{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::random(6)) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">{{ $p[1] }}</td>
                                    <td class="px-4 py-3">{{ $p[2] }}</td>
                                    <td class="px-4 py-3">{{ $p[3] }}</td>
                                    <td class="px-4 py-3">
                                        @php $status = $p[4]; @endphp
                                        <span class="inline-flex items-center px-2 py-1 text-xs rounded
                                            {{ $status === 'Active' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <div class="inline-flex gap-2">
                                            <a href="#" class="px-3 py-1 rounded bg-[#f4f8ff] text-[#1a8dc3] hover:bg-[#eaf4fb] transition">Edit</a>
                                            <a href="#" class="px-3 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200 transition">Archive</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
