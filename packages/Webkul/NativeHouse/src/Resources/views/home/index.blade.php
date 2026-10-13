@extends('shop::components.layouts.base')

@section('title', __('native-house::app.brand.name'))

@section('content')
    {{-- Hero --}}
    <section class="relative w-full h-[80vh] flex items-center justify-center overflow-hidden">
        <img
            src="https://picsum.photos/1920/1080?random=1"
            alt="Hero"
            class="absolute inset-0 w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-charcoal/40"></div>

        <div class="relative z-10 text-center text-cream max-w-3xl px-6">
            <h1 class="text-5xl md:text-6xl font-display mb-6">
                {{ __('native-house::app.home.hero_title') }}
            </h1>
            <p class="text-lg md:text-xl mb-8">
                {{ __('native-house::app.home.hero_subtitle') }}
            </p>
            <a
                href="#"
                class="inline-block bg-sage text-cream px-8 py-3 rounded-full text-sm uppercase tracking-wider hover:bg-terracotta transition"
            >
                {{ __('native-house::app.home.hero_cta') }}
            </a>
        </div>
    </section>

    {{-- Featured Categories --}}
    <section class="max-w-7xl mx-auto px-6 py-24">
        <h2 class="text-3xl font-display text-center mb-12">
            Shop by Category
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach (['furniture', 'lighting', 'textiles', 'plants'] as $category)
                <a href="#" class="group relative block overflow-hidden rounded-lg">
                    <img
                        src="https://picsum.photos/600/800?random={{ $loop->index + 10 }}"
                        alt="{{ $category }}"
                        class="w-full h-80 object-cover group-hover:scale-105 transition duration-500"
                    >
                    <div class="absolute inset-0 bg-charcoal/30 flex items-end p-6">
                        <span class="text-cream text-lg font-display">
                            {{ __('native-house::app.categories.' . $category) }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection