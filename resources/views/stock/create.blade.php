<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Manage Stock</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('stock.store') }}" method="POST">
                    @csrf

                    <!-- Select Product -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Product</label>
                        <select name="product_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                            <option value="">-- Select Product --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                                    {{ $product->name }} (Stock: {{ $product->quantity }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Stock Type -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Type</label>
                        <select name="type" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                            <option value="in" @selected(old('type')=='in')>Stock In</option>
                            <option value="out" @selected(old('type')=='out')>Stock Out</option>
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}" min="1"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                    </div>

                    <!-- Remarks -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Remarks (optional)</label>
                        <input type="text" name="remarks" value="{{ old('remarks') }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-coffee focus:border-coffee">
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2 mt-6">
                        <button type="submit" class="bg-coffee text-white px-4 py-2 rounded hover:bg-coffee-dark transition">
                            💾 Save
                        </button>
                        <a href="{{ route('dashboard') }}"
                           class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                           ❌ Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
