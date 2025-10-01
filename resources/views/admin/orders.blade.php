<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#1a8dc3] font-montserrat">Orders</h2>
            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500">Last sync: just now</span>
            </div>
        </div>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-8 bg-[#f4f8ff]">
        <div class="max-w-7xl mx-auto space-y-6">

            {{-- Filters --}}
            <section class="bg-white rounded-xl shadow-xl p-6">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div class="md:col-span-2">
                        <label class="text-xs text-gray-500">Search</label>
                        <input type="text" placeholder="Search order # or customer"
                               class="mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3]">
                    </div>
                    <div>
                        <label class="text-xs text-gray-500">Status</label>
                        <select class="mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3]">
                            <option>All</option>
                            <option>Paid</option>
                            <option>Processing</option>
                            <option>Shipped</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs text-gray-500">Date From</label>
                        <input type="date" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a8dc3]">
                    </div>
                    <div class="flex items-end">
                        <button class="w-full px-4 py-2 bg-[#1a8dc3] text-white rounded-lg hover:bg-[#176fa1] transition">Apply</button>
                    </div>
                </div>
            </section>

            {{-- Orders table --}}
            <section class="bg-white rounded-xl shadow-xl p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-[#f4f8ff]">
                            <tr class="text-left text-gray-600">
                                <th class="px-4 py-3">Order #</th>
                                <th class="px-4 py-3">Customer</th>
                                <th class="px-4 py-3">Items</th>
                                <th class="px-4 py-3">Total</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['#10045','A. Santos','2','₱2,450','2025-09-25','Paid'],
                                ['#10044','M. Cruz','1','₱5,990','2025-09-24','Processing'],
                                ['#10043','J. Dela Cruz','3','₱9,440','2025-09-24','Shipped'],
                            ] as $o)
                                <tr class="hover:bg-[#f9fbff]">
                                    <td class="px-4 py-3 font-medium">{{ $o[0] }}</td>
                                    <td class="px-4 py-3">{{ $o[1] }}</td>
                                    <td class="px-4 py-3">{{ $o[2] }}</td>
                                    <td class="px-4 py-3">{{ $o[3] }}</td>
                                    <td class="px-4 py-3">{{ $o[4] }}</td>
                                    <td class="px-4 py-3">
                                        @php $status = $o[5]; @endphp
                                        <span class="inline-flex items-center px-2 py-1 text-xs rounded
                                            {{ $status === 'Paid' ? 'bg-green-100 text-green-700' :
                                               ($status === 'Shipped' ? 'bg-blue-100 text-blue-700' :
                                               ($status === 'Processing' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700')) }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <div class="inline-flex gap-2">
                                            <a href="#" class="px-3 py-1 rounded bg-[#f4f8ff] text-[#1a8dc3] hover:bg-[#eaf4fb] transition">View</a>
                                            <a href="#" class="px-3 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 transition">Mark Shipped</a>
                                            <a href="#" class="px-3 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200 transition">Cancel</a>
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
