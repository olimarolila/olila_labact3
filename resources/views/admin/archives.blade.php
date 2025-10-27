<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#1a8dc3] font-montserrat">Archives</h2>
            <a href="{{ route('admin.products') }}" class="inline-flex items-center px-4 py-1.5 bg-[#1a8dc3] text-white rounded-lg hover:bg-[#176fa1] transition shadow text-sm font-medium">
                ← Back to Products
            </a>
        </div>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-8 bg-[#f4f8ff]">
        <div class="max-w-7xl mx-auto space-y-6">
            {{-- Success Message --}}
            @if (session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-show="show"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert"
                >
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg @click="show = false" class="fill-current h-6 w-6 text-green-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                        </svg>
                    </span>
                </div>
            @endif

            {{-- Archived Products Table --}}
            <section class="bg-white rounded-xl shadow-xl p-6">
                <h2 class="font-bold text-2xl text-[#1a8dc3]">Archived Products</h2>
                <span>{{ $trashed->total() }} items</span>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm rounded-lg overflow-hidden shadow-sm">
                        <thead class="bg-[#1a8dc3] text-white">
                            <tr>
                                <th class="px-4 py-3 font-medium text-left border border-gray-300">#</th>
                                <th class="px-4 py-3 font-medium text-left border border-gray-300">Product</th>
                                <th class="px-4 py-3 font-medium text-left border border-gray-300">Description</th>
                                <th class="px-4 py-3 font-medium text-left border border-gray-300">Price</th>
                                <th class="px-4 py-3 font-medium text-left border border-gray-300">User</th>
                                <th class="px-4 py-3 font-medium text-left border border-gray-300">Deleted_at</th>
                                <th class="px-4 py-3 font-medium text-left border border-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($trashed as $product)
                            <tr class="hover:bg-[#f4f8ff] transition">
                                <td class="px-4 py-3 text-gray-700 font-medium border border-gray-200">{{ $product->id }}</td>
                                <td class="px-4 py-3 text-gray-700 border border-gray-200">{{ $product->name }}</td>
                                <td class="px-4 py-3 text-gray-500 border border-gray-200">{{ $product->description }}</td>
                                <td class="px-4 py-3 text-gray-700 font-semibold border border-gray-200">₱{{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-3 text-gray-600 border border-gray-200">{{ $product->user->name }}</td>
                                <td class="px-4 py-3 text-gray-500 border border-gray-200">{{ $product->deleted_at->diffForHumans() }}</td>
                                <td class="px-4 py-3 border border-gray-200">
                                    <div class="flex items-center gap-2">
                                        {{-- Restore Button --}}
                                        <a href="{{ url('/admin/products/restore/'.$product->id) }}" 
                                        class="inline-flex items-center justify-center p-2 rounded-lg bg-[#1a8dc3] hover:bg-[#176fa1] transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white" class="w-4 h-4">
                                                <path fillRule="evenodd" d="M15.312 11.424a5.5 5.5 0 0 1-9.201 2.466l-.312-.311h2.433a.75.75 0 0 0 0-1.5H3.989a.75.75 0 0 0-.75.75v4.242a.75.75 0 0 0 1.5 0v-2.43l.31.31a7 7 0 0 0 11.712-3.138.75.75 0 0 0-1.449-.39Zm1.23-3.723a.75.75 0 0 0 .219-.53V2.929a.75.75 0 0 0-1.5 0V5.36l-.31-.31A7 7 0 0 0 3.239 8.188a.75.75 0 1 0 1.448.389A5.5 5.5 0 0 1 13.89 6.11l.311.31h-2.432a.75.75 0 0 0 0 1.5h4.243a.75.75 0 0 0 .53-.219Z" clipRule="evenodd" />
                                            </svg>
                                        </a>

                                        {{-- Permanent Delete Button --}}
                                        <button onclick="openDeleteModal({{ $product->id }})" 
                                            class="inline-flex items-center justify-center p-2 rounded-lg bg-[#ff5252] hover:bg-red-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white" class="w-4 h-4">
                                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{ $trashed->withQueryString()->links() }}
                </div>
            </section>
        </div>
    </main>
</x-app-layout>

{{-- Delete Confirmation Modal --}}
<div id="deleteModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-2">⚠️ Confirm Deletion</h2>
        <p class="text-gray-600 mb-4">Are you sure you want to permanently delete this product? This action cannot be undone.</p>
        
        <div class="flex justify-end gap-3">
            <button onclick="closeDeleteModal()" 
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                Cancel
            </button>
            <a id="confirmDeleteBtn" href="#" 
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Delete
            </a>
        </div>
    </div>
</div>

<script>
    let deleteUrl = "";

    function openDeleteModal(productId) {
        deleteUrl = `/admin/products/destroy/${productId}`;
        document.getElementById('confirmDeleteBtn').setAttribute('href', deleteUrl);
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
