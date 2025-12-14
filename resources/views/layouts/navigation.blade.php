<nav x-data="{ open: false }" class="bg-coffee border-b border-coffee-dark shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT SIDE -->
            <div class="flex items-center space-x-6">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="text-white font-bold text-lg">
                    ☕ Pioneer Furnitures
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-6">

                    <a href="{{ route('dashboard') }}"
                       class="text-white hover:text-yellow-200 font-medium {{ request()->routeIs('dashboard') ? 'border-b-2 border-yellow-300' : '' }}">
                        Dashboard
                    </a>

                    {{-- ADMIN ONLY --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('products.index') }}"
                           class="text-white hover:text-yellow-200 font-medium {{ request()->routeIs('products.*') ? 'border-b-2 border-yellow-300' : '' }}">
                            Products
                        </a>

                        <a href="{{ route('categories.index') }}"
                           class="text-white hover:text-yellow-200 font-medium {{ request()->routeIs('categories.*') ? 'border-b-2 border-yellow-300' : '' }}">
                            Categories
                        </a>
                    @endif

                    {{-- STAFF + ADMIN --}}
                    <a href="{{ route('stock.create') }}"
                       class="text-white hover:text-yellow-200 font-medium {{ request()->routeIs('stock.create') ? 'border-b-2 border-yellow-300' : '' }}">
                        Stock In / Out
                    </a>

                    <a href="{{ route('stock.history') }}"
                       class="text-white hover:text-yellow-200 font-medium {{ request()->routeIs('stock.history') ? 'border-b-2 border-yellow-300' : '' }}">
                        Stock History
                    </a>

                    <a href="{{ route('inventory.index') }}"
                       class="text-white hover:text-yellow-200 font-medium {{ request()->routeIs('inventory.*') ? 'border-b-2 border-yellow-300' : '' }}">
                        Inventory
                    </a>

                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="hidden sm:flex items-center space-x-4">

                <!-- ROLE BADGE -->
                <span class="text-xs px-2 py-1 rounded 
                    {{ auth()->user()->role === 'admin' ? 'bg-green-600' : 'bg-blue-600' }} text-white">
                    {{ strtoupper(auth()->user()->role) }}
                </span>

                <a href="{{ route('profile.edit') }}"
                   class="text-white hover:text-yellow-200 font-medium">
                    {{ Auth::user()->name }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                        Logout
                    </button>
                </form>
            </div>

            <!-- MOBILE MENU BUTTON -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                    class="text-white focus:outline-none">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" class="sm:hidden bg-coffee-dark px-4 pb-4 space-y-2">
        <a href="{{ route('dashboard') }}"
           class="block text-white {{ request()->routeIs('dashboard') ? 'border-b-2 border-yellow-300' : '' }}">
            Dashboard
        </a>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('products.index') }}"
               class="block text-white {{ request()->routeIs('products.*') ? 'border-b-2 border-yellow-300' : '' }}">
                Products
            </a>

            <a href="{{ route('categories.index') }}"
               class="block text-white {{ request()->routeIs('categories.*') ? 'border-b-2 border-yellow-300' : '' }}">
                Categories
            </a>
        @endif

        <a href="{{ route('stock.create') }}"
           class="block text-white {{ request()->routeIs('stock.create') ? 'border-b-2 border-yellow-300' : '' }}">
            Stock In / Out
        </a>

        <a href="{{ route('stock.history') }}"
           class="block text-white {{ request()->routeIs('stock.history') ? 'border-b-2 border-yellow-300' : '' }}">
            Stock History
        </a>

        <a href="{{ route('inventory.index') }}"
           class="block text-white {{ request()->routeIs('inventory.*') ? 'border-b-2 border-yellow-300' : '' }}">
            Inventory
        </a>

        <a href="{{ route('profile.edit') }}" class="block text-white">Profile</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-red-300 mt-2">Logout</button>
        </form>
    </div>
</nav>
