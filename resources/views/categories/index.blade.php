<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Categories</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <!-- Add Category Button -->
                <div class="mb-4">
                    <a href="{{ route('categories.create') }}"
                       class="bg-coffee text-white px-4 py-2 rounded inline-block hover:bg-coffee-dark transition">
                       ➕ Add Category
                    </a>
                </div>

                <!-- Categories Table -->
                <table class="w-full border border-gray-200">
                    <thead>
                        <tr class="bg-coffee-light text-white">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $category->id }}</td>
                            <td class="border px-4 py-2">{{ $category->name }}</td>
                            <td class="border px-4 py-2">{{ $category->description }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="text-coffee hover:text-coffee-dark font-medium">
                                   ✏️ Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 font-medium hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
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
