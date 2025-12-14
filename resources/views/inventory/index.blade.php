<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Inventory Report</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <!-- Download PDF Button -->
                <div class="mb-4">
                    <a href="{{ route('reports.inventory') }}"
                       class="bg-coffee text-white px-4 py-2 rounded hover:bg-coffee-dark transition">
                       📄 Download PDF
                    </a>
                </div>

                <!-- Inventory Table -->
                <table class="w-full border border-gray-200">
                    <thead>
                        <tr class="bg-coffee-light text-white">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">SKU</th>
                            <th class="border px-4 py-2">Category</th>
                            <th class="border px-4 py-2">Unit Price</th>
                            <th class="border px-4 py-2">Stock Quantity</th>
                            <th class="border px-4 py-2">Total Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            @php
                                $totalValue = $product->price * $product->quantity;
                                $lowStock = $product->quantity <= $product->low_stock_level;
                            @endphp
                            <tr class="hover:bg-gray-50 {{ $lowStock ? 'bg-red-100' : '' }}">
                                <td class="border px-4 py-2">{{ $product->id }}</td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->sku }}</td>
                                <td class="border px-4 py-2">{{ $product->category->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">₱{{ number_format($product->price, 2) }}</td>
                                <td class="border px-4 py-2">{{ $product->quantity }}</td>
                                <td class="border px-4 py-2">₱{{ number_format($totalValue, 2) }}</td>
                            </tr>
                        @endforeach

                        <!-- Grand Total Row -->
                        <tr class="bg-coffee-light text-white font-bold">
                            <td class="border px-4 py-2 text-center" colspan="6">Total Inventory Value</td>
                            <td class="border px-4 py-2">₱{{ number_format($grandTotal, 2) }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('dashboard') }}"
                       class="bg-coffee text-white px-4 py-2 rounded hover:bg-coffee-dark transition">
                       ← Back to Dashboard
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
