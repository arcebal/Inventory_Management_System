<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">{{ $product->name }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <!-- Product Image -->
                <div class="mb-6 w-full h-80 bg-gray-100 rounded flex items-center justify-center overflow-hidden">
                    @if($product->image && file_exists(storage_path('app/public/' . $product->image)))
                        <img src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="max-h-full max-w-full object-contain">
                    @else
                        <span class="text-gray-400">No image available</span>
                    @endif
                </div>


                <!-- Product Details -->
                <div class="space-y-2">
                    <p><strong>SKU / Item Code:</strong> {{ $product->sku }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                    <p><strong>Price:</strong> ₱{{ number_format($product->price, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $product->quantity }}</p>
                    <p><strong>Description:</strong> {{ $product->description ?? 'No description available.' }}</p>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('products.index') }}"
                       class="bg-coffee text-white px-4 py-2 rounded hover:bg-coffee-dark transition">
                       ← Back to Products
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
