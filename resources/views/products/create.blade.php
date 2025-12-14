<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Add New Product</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Product Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                        @error('name') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Category</label>
                        <select name="category_id"
                                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Unit Price</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                        @error('price') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stock Quantity -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Initial Stock Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                        @error('quantity') <p class="text-danger mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Description</label>
                        <textarea name="description" rows="4"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee"
                            placeholder="Enter product description...">{{ old('description') }}</textarea>
                        @error('description') <p class="text-danger mt-1">{{ $message }}</p> @enderror
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
                            💾 Save
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
