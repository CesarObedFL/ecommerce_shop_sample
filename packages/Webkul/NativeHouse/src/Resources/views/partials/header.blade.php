<header class="w-full bg-cream border-b border-sand">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        {{-- Brand --}}
        <a href="{{ route('shop.home.index') }}" class="text-2xl font-display text-charcoal">
            {{ __('native-house::app.brand.name') }}
        </a>

        {{-- Navigation --}}
        <nav class="hidden md:flex items-center gap-8">
            <a href="#" class="text-sm hover:text-sage transition">
                {{ __('native-house::app.categories.furniture') }}
            </a>
            <a href="#" class="text-sm hover:text-sage transition">
                {{ __('native-house::app.categories.lighting') }}
            </a>
            <a href="#" class="text-sm hover:text-sage transition">
                {{ __('native-house::app.categories.textiles') }}
            </a>
            <a href="#" class="text-sm hover:text-sage transition">
                {{ __('native-house::app.categories.plants') }}
            </a>
        </nav>

        {{-- Actions --}}
        <div class="flex items-center gap-4">
            <a href="#" class="text-sm hover:text-sage transition">Search</a>
            <a href="#" class="text-sm hover:text-sage transition">Cart</a>
        </div>
    </div>
</header>