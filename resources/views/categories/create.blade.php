<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Add Category</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1">Name</label>
                        <input type="text" name="name" class="w-full border px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Description</label>
                        <textarea name="description" class="w-full border px-3 py-2"></textarea>
                    </div>
                    <button type="submit" class="bg-coffee text-white px-4 py-2 rounded hover:bg-coffee-dark transition">Save</button>
                </form>
            </div>
        </div>
    </div>

    
</x-app-layout>
