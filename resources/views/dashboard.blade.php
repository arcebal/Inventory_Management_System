<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Pionere Furnitures Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Welcome!</h3>
                <p>You are logged in as <strong>{{ auth()->user()->role }}</strong>.</p>
            </div>
        </div>
    </div>
</x-app-layout>
