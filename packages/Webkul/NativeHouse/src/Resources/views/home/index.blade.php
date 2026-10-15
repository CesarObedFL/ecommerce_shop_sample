@extends('native-house::components.layouts.base')

@section('title', __('native-house::app.brand.name'))

@section('content')
    {{-- Hero --}}
    <section class="relative w-full h-[80vh] flex items-center justify-center overflow-hidden">
        <img
            src="https://plus.unsplash.com/premium_photo-1661876380847-be2a1fae414e?q=80&w=869&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
            alt="furniture"
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

            <a href="#" class="group relative block overflow-hidden rounded-lg">
                <img
                    src="https://images.unsplash.com/photo-1599696848652-f0ff23bc911f?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                    alt="furniture"
                    class="w-full h-80 object-cover group-hover:scale-105 transition duration-500"
                >
                <div class="absolute inset-0 bg-charcoal/30 flex items-end p-6">
                    <span class="text-cream text-lg font-display">
                        {{ __('native-house::app.categories.' . 'furniture') }}
                    </span>
                </div>
            </a>
            <a href="#" class="group relative block overflow-hidden rounded-lg">
                <img
                    src="https://images.unsplash.com/photo-1540932239986-30128078f3c5?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                    alt="lighting"
                    class="w-full h-80 object-cover group-hover:scale-105 transition duration-500"
                >
                <div class="absolute inset-0 bg-charcoal/30 flex items-end p-6">
                    <span class="text-cream text-lg font-display">
                        {{ __('native-house::app.categories.' . 'lighting') }}
                    </span>
                </div>
            </a>
            <a href="#" class="group relative block overflow-hidden rounded-lg">
                <img
                    src="https://images.unsplash.com/photo-1640747669771-b82a6e40f534?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                    alt="textiles"
                    class="w-full h-80 object-cover group-hover:scale-105 transition duration-500"
                >
                <div class="absolute inset-0 bg-charcoal/30 flex items-end p-6">
                    <span class="text-cream text-lg font-display">
                        {{ __('native-house::app.categories.' . 'textiles') }}
                    </span>
                </div>
            </a>
            <a href="#" class="group relative block overflow-hidden rounded-lg">
                <img
                    src="https://images.unsplash.com/photo-1584589167171-541ce45f1eea?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                    alt="plants"
                    class="w-full h-80 object-cover group-hover:scale-105 transition duration-500"
                >
                <div class="absolute inset-0 bg-charcoal/30 flex items-end p-6">
                    <span class="text-cream text-lg font-display">
                        {{ __('native-house::app.categories.' . 'plants') }}
                    </span>
                </div>
            </a>
        </div>
    </section>
@endsection