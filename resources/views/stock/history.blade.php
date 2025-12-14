<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-coffee mb-2">Stock Movement History</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <!-- Success message -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Stock Movements Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-coffee-light text-white">
                            <tr>
                                <th class="border px-4 py-2 text-left">Product</th>
                                <th class="border px-4 py-2 text-left">Type</th>
                                <th class="border px-4 py-2 text-left">Quantity</th>
                                <th class="border px-4 py-2 text-left">Remarks</th>
                                <th class="border px-4 py-2 text-left">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($movements as $move)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $move->product->name }}</td>
                                    <td class="border px-4 py-2">
                                        @if($move->type === 'in')
                                            <span class="text-green-600 font-semibold">IN</span>
                                        @else
                                            <span class="text-red-600 font-semibold">OUT</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">{{ $move->quantity }}</td>
                                    <td class="border px-4 py-2">{{ $move->remarks ?? '-' }}</td>
                                    <td class="border px-4 py-2">{{ $move->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-2 text-center text-gray-500">
                                        No stock movements found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('dashboard') }}"
                       class="bg-coffee text-white px-4 py-2 rounded hover:bg-coffee-dark transition">
                       ← Back to Dashboard
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
