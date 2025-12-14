<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Pionere Furnitures Dashboard
            </h2>
            <span class="px-3 py-1 rounded-full text-sm font-medium
                {{ auth()->user()->role === 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800' }}">
                {{ strtoupper(auth()->user()->role) }}
            </span>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Products Card -->
                <a href="{{ route('products.index') }}" class="block bg-coffee text-white p-4 rounded shadow hover:bg-coffee-dark transition">
                    <h3 class="text-sm font-semibold">Products</h3>
                    <p class="text-2xl font-bold">{{ $totalProducts }}</p>
                </a>

                <!-- Stock History Card -->
                <a href="{{ route('stock.history') }}" class="block bg-yellow-500 text-white p-4 rounded shadow hover:bg-yellow-600 transition">
                    <h3 class="text-sm font-semibold">Stock History</h3>
                    <p class="text-2xl font-bold">{{ $totalStock }}</p>
                </a>

                <!-- Inventory Card -->
                <a href="{{ route('inventory.index') }}" class="block bg-red-500 text-white p-4 rounded shadow hover:bg-red-600 transition">
                    <h3 class="text-sm font-semibold">Inventory</h3>
                    <p class="text-2xl font-bold">{{ $lowStockProducts->count() }}</p>
                </a>

                <!-- Manage Stock Card -->
                <a href="{{ route('stock.create') }}" class="block bg-green-500 text-white p-4 rounded shadow hover:bg-green-600 transition">
                    <h3 class="text-sm font-semibold">Manage Stock</h3>
                    <p class="text-2xl font-bold">{{ $recentProducts->count() }}</p>
                </a>

            </div>

            <!-- Category Stock Chart -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Stock per Category</h3>
                <canvas id="categoryChart" class="w-full h-64"></canvas>
            </div>

            <!-- Low Stock Table -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Low Stock Products</h3>
                <table class="w-full border border-gray-200">
                    <thead class="bg-red-100">
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Stock</th>
                            <th class="border px-4 py-2">Low Stock Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lowStockProducts as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $product->id }}</td>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">{{ $product->quantity }}</td>
                            <td class="border px-4 py-2">{{ $product->low_stock_level }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Chart Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($categoryNames),
                datasets: [{
                    label: 'Stock Quantity',
                    data: @json($categoryStock),
                    backgroundColor: 'rgba(59, 130, 246, 0.7)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: { display: true, text: 'Stock per Category' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-app-layout>
