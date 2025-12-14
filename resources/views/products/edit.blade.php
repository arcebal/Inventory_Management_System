<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Edit Product</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <!-- Image Preview -->
                <div class="mb-6 w-full h-64 bg-gray-100 rounded flex items-center justify-center overflow-hidden">
                    @if($product->image && file_exists(storage_path('app/public/' . $product->image)))
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="max-h-full max-w-full object-contain">
                    @else
                        <span class="text-gray-400">No image uploaded</span>
                    @endif
                </div>

                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-4">
                        <label class="block font-medium">Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}"
                               class="w-full rounded border-gray-300">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block font-medium">Description</label>
                        <textarea name="description" rows="4"
                            class="w-full rounded border-gray-300">{{ $product->description }}</textarea>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="block font-medium">Stock Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}"
                               class="w-full rounded border-gray-300">
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <label class="block font-medium">Price</label>
                        <input type="number" step="0.01" name="price" value="{{ $product->price }}"
                               class="w-full rounded border-gray-300">
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="block font-medium">Category</label>
                        <select name="category_id" class="w-full rounded border-gray-300">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Change Image -->
                    <div class="mb-4">
                        <label class="block font-medium">Change Image</label>
                        <input type="file" name="image" accept="image/*">
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2">
                        <button class="bg-coffee text-white px-4 py-2 rounded">
                            💾 Update
                        </button>
                        <a href="{{ route('products.index') }}"
                           class="bg-gray-300 px-4 py-2 rounded">
                           Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
