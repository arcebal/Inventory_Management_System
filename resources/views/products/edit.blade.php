<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Edit Product</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                        @error('name') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- SKU (readonly) -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">SKU / Item Code</label>
                        <input type="text" value="{{ $product->sku }}" readonly
                               class="mt-1 block w-full rounded border-gray-300 bg-gray-100 shadow-sm cursor-not-allowed">
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Category</label>
                        <select name="category_id"
                                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Unit Price</label>
                        <input type="number" step="0.01" name="price" value="{{ $product->price }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                        @error('price') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stock Quantity -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Stock Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                        @error('quantity') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Product Image -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Product Image</label>
                        <input type="file" name="image" accept="image/*"
                               class="mt-1 block w-full text-gray-700">
                        @error('image') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2 mt-6">
                        <button type="submit" class="bg-coffee text-white px-4 py-2 rounded hover:bg-coffee-dark transition">
                            💾 Update
                        </button>
                        <a href="{{ route('products.index') }}"
                           class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                           ❌ Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
