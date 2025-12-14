@php
    $setting = \App\Models\Setting::first();
@endphp

<footer class="bg-coffee-dark text-white py-4 mt-6">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            @if($setting && $setting->logo)
                <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="h-8 w-8">
            @endif
            <span class="font-bold text-lg">{{ $setting->company_name ?? 'Pionere Furnitures' }}</span>
        </div>

        <div class="text-sm">
            &copy; {{ date('Y') }} {{ $setting->company_name ?? 'Pionere Furnitures' }}. All rights reserved.
        </div>
    </div>
</footer>
