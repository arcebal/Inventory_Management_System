<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Products</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                
                <!-- Add Product Button -->
                <a href="{{ route('products.create') }}"
                   class="bg-coffee text-white px-4 py-2 rounded mb-4 inline-block hover:bg-coffee-dark transition">
                   ➕ Add Product
                </a>

                <!-- Products Table -->
                <table class="w-full border border-gray-200">
                    <thead>
                        <tr class="bg-coffee-light text-white">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">SKU</th>
                            <th class="border px-4 py-2">Category</th>
                            <th class="border px-4 py-2">Price</th>
                            <th class="border px-4 py-2">Stock</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $product->id }}</td>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">{{ $product->sku }}</td>
                            <td class="border px-4 py-2">{{ $product->category->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">₱{{ number_format($product->price, 2) }}</td>
                            <td class="border px-4 py-2">{{ $product->quantity }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <!-- View Product Button -->
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="text-coffee hover:text-coffee-dark font-medium">
                                   🔍 View
                                </a>
                                <!-- Edit Product Button -->
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="text-coffee hover:text-coffee-dark font-medium">
                                   ✏️ Edit
                                </a>
                                <!-- Delete Product Button -->
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-danger font-medium hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                        🗑 Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
