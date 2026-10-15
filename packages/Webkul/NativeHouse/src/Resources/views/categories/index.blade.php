@extends('shop::components.layouts.base')

@section('title', __('native-house::app.brand.name'))

@section('content')
    @foreach ($sections as $section)
        @php ($data = $section->options) @endphp

        @php ($marks = ($preview ?? false) && ! $section->getTypeInstance()?->rendersInLayout())

        @if ($marks)
            <div
                data-section-id="{{ $section->id }}"
                data-section-name="{{ $section->name }}"
            >
        @endif

        @switch ($section->type)
            @case ('hero_banner')
                @php ($slide = $data['slides'][0] ?? null) @endphp
                @if ($slide)
                    @php ($urls = bagisto_theme_storage()->imageUrls($slide['image'] ?? null)) @endphp
                    <section class="relative w-full h-[80vh] flex items-center justify-center overflow-hidden">
                        <img
                            src="{{ $urls['srcset']['large'] ?? $urls['url'] ?? 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=1920&q=80' }}"
                            alt="{{ $slide['heading'] ?? '' }}"
                            class="absolute inset-0 w-full h-full object-cover"
                        >
                        <div class="absolute inset-0 bg-charcoal/40"></div>

                        <div class="relative z-10 text-center text-cream max-w-3xl px-6">
                            <h1 class="text-5xl md:text-6xl font-display mb-6">
                                {{ $slide['heading'] ?? __('native-house::app.home.hero_title') }}
                            </h1>
                            <p class="text-lg md:text-xl mb-8">
                                {{ $slide['subheading'] ?? __('native-house::app.home.hero_subtitle') }}
                            </p>
                            <a
                                href="{{ $slide['link'] ?? '#' }}"
                                class="inline-block bg-sage text-cream px-8 py-3 rounded-full text-sm uppercase tracking-wider hover:bg-terracotta transition"
                            >
                                {{ $slide['button_text'] ?? __('native-house::app.home.hero_cta') }}
                            </a>
                        </div>
                    </section>
                @endif
                @break

            @case (\Webkul\Theme\Enums\SectionTypeEnum::CATEGORY_CAROUSEL->value)
                <section class="max-w-7xl mx-auto px-6 py-24">
                    <h2 class="text-3xl font-display text-center mb-12">
                        {{ $data['title'] ?? 'Shop by Category' }}
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach ($data['categories'] ?? [] as $category)
                            <a href="{{ $category['url'] ?? '#' }}" class="group relative block overflow-hidden rounded-lg">
                                <img
                                    src="{{ $category['image'] ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&h=800&fit=crop' }}"
                                    alt="{{ $category['name'] ?? '' }}"
                                    class="w-full h-80 object-cover group-hover:scale-105 transition duration-500"
                                >
                                <div class="absolute inset-0 bg-charcoal/30 flex items-end p-6">
                                    <span class="text-cream text-lg font-display">{{ $category['name'] ?? '' }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
                @break

            @case (\Webkul\Theme\Enums\SectionTypeEnum::PRODUCT_CAROUSEL->value)
                <section class="max-w-7xl mx-auto px-6 py-24">
                    <h2 class="text-3xl font-display text-center mb-12">
                        {{ $data['title'] ?? 'Featured Products' }}
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach ($data['products'] ?? [] as $product)
                            <a href="{{ $product['url'] ?? '#' }}" class="group">
                                <img
                                    src="{{ $product['image'] ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&h=500&fit=crop' }}"
                                    alt="{{ $product['name'] ?? '' }}"
                                    class="w-full h-64 object-cover rounded-lg group-hover:scale-105 transition duration-500 mb-4"
                                >
                                <h3 class="text-sm font-medium">{{ $product['name'] ?? '' }}</h3>
                                <p class="text-sm text-charcoal/60">{{ $product['price'] ?? '' }}</p>
                            </a>
                        @endforeach
                    </div>
                </section>
                @break

            @case (\Webkul\Theme\Enums\SectionTypeEnum::STATIC_CONTENT->value)
                <section class="max-w-7xl mx-auto px-6 py-24">
                    {!! $data['html'] ?? '' !!}
                </section>
                @break

            @case (\Webkul\Theme\Enums\SectionTypeEnum::FOOTER_LINKS->value)
                {{-- El footer se renderiza en el layout, no aquí --}}
                @break
        @endswitch

        @if ($marks)
            </div>
        @endif
    @endforeach

    @if ($preview ?? false)
        @include('shop::home.preview-bridge')
    @endif
@endsection