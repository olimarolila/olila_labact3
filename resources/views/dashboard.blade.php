<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-[#1a8dc3] font-montserrat">Admin Dashboard</h2>
        </div>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-8 bg-[#f4f8ff]">
        <div class="max-w-7xl mx-auto space-y-8">

            {{-- KPI cards --}}
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['title' => 'Total Sales', 'value' => '₱128,450', 'sub'=>'Last 30 days', 'icon'=>'💎'],
                    ['title' => 'Orders', 'value' => '342', 'sub'=>'+12% vs last wk','icon'=>'🛒'],
                    ['title' => 'Customers', 'value' => '1,098', 'sub'=>'Active','icon'=>'👤'],
                    ['title' => 'Low Stock', 'value' => '7 items', 'sub'=>'Needs restock','icon'=>'⚠️'],
                ] as $card)
                    <div class="bg-white rounded-xl shadow-xl p-5 transition transform hover:scale-[1.02] hover:shadow-2xl">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-gray-500">{{ $card['title'] }}</p>
                                <h3 class="mt-1 text-2xl font-extrabold text-[#1a8dc3] font-montserrat">{{ $card['value'] }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $card['sub'] }}</p>
                            </div>
                            <div class="text-2xl">{{ $card['icon'] }}</div>
                        </div>
                    </div>
                @endforeach
            </section>

            {{-- Charts + quick links --}}
            <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-xl p-6 lg:col-span-2 relative overflow-hidden">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#1a8dc3]/10 rounded-full blur-3xl -z-10"></div>
                    <h3 class="text-lg font-bold text-[#1a8dc3] font-montserrat mb-4">Sales Overview</h3>
                    <div class="border-2 border-dashed border-gray-200 rounded-lg h-56 grid place-items-center text-gray-500"></div>
                </div>

                <div class="bg-white rounded-xl shadow-xl p-6">
                    <h3 class="text-lg font-bold text-[#1a8dc3] font-montserrat mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="#" class="block px-4 py-3 bg-[#f4f8ff] rounded-lg hover:bg-[#eaf4fb] shadow-sm transition">➕ Add New Product</a>
                        <a href="#" class="block px-4 py-3 bg-[#f4f8ff] rounded-lg hover:bg-[#eaf4fb] shadow-sm transition">📦 View Orders</a>
                        <a href="#" class="block px-4 py-3 bg-[#f4f8ff] rounded-lg hover:bg-[#eaf4fb] shadow-sm transition">📈 Download Reports</a>
                    </div>
                </div>
            </section>

            {{-- Recent orders table --}}
            <section class="bg-white rounded-xl shadow-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-[#1a8dc3] font-montserrat">Recent Orders</h3>
                    <a href="#" class="text-sm text-[#1a8dc3] hover:underline">See all</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-[#f4f8ff]">
                            <tr class="text-left text-gray-600">
                                <th class="px-4 py-3">Order #</th>
                                <th class="px-4 py-3">Customer</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Total</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['#10045','A. Santos','2025-09-25','₱2,450','Paid'],
                                ['#10044','M. Cruz','2025-09-24','₱5,990','Processing'],
                                ['#10043','J. Dela Cruz','2025-09-24','₱3,450','Shipped'],
                            ] as $o)
                                <tr class="hover:bg-[#f9fbff]">
                                    <td class="px-4 py-3 font-medium">{{ $o[0] }}</td>
                                    <td class="px-4 py-3">{{ $o[1] }}</td>
                                    <td class="px-4 py-3">{{ $o[2] }}</td>
                                    <td class="px-4 py-3">{{ $o[3] }}</td>
                                    <td class="px-4 py-3">
                                        @php $status = $o[4]; @endphp
                                        <span class="inline-flex items-center px-2 py-1 text-xs rounded
                                            {{ $status === 'Paid' ? 'bg-green-100 text-green-700' :
                                               ($status === 'Shipped' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700') }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <a href="#" class="text-[#1a8dc3] hover:underline text-sm">View</a>
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
