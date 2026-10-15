@extends('shop::components.layouts.base')

@section('title', $category->name ?? 'Shop')

@section('content')
    {{-- Category Header --}}
    <section class="w-full bg-sand/30 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-display text-charcoal mb-4">
                {{ $category->name ?? 'Shop' }}
            </h1>
            @if (! empty($category->description))
                <p class="text-lg text-charcoal/70 max-w-2xl">
                    {{ $category->description }}
                </p>
            @endif
        </div>
    </section>

    {{-- Products Grid --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {{-- Filters Sidebar --}}
            <aside class="lg:col-span-1">
                <h3 class="text-lg font-display mb-6">Filters</h3>

                {{-- Price Filter --}}
                <div class="mb-8">
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-3">Price</h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-sand text-sage focus:ring-sage">
                            <span>Under $100</span>
                        </label>
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-sand text-sage focus:ring-sage">
                            <span>$100 - $500</span>
                        </label>
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-sand text-sage focus:ring-sage">
                            <span>Over $500</span>
                        </label>
                    </div>
                </div>

                {{-- Material Filter --}}
                <div class="mb-8">
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-3">Material</h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-sand text-sage focus:ring-sage">
                            <span>Wood</span>
                        </label>
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-sand text-sage focus:ring-sage">
                            <span>Linen</span>
                        </label>
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-sand text-sage focus:ring-sage">
                            <span>Ceramic</span>
                        </label>
                    </div>
                </div>
            </aside>

            {{-- Products --}}
            <div class="lg:col-span-3">
                {{-- Sort Bar --}}
                <div class="flex items-center justify-between mb-8">
                    <p class="text-sm text-charcoal/60">
                        {{ $products->total() ?? 0 }} products
                    </p>
                    <select class="text-sm border-sand rounded-md focus:ring-sage focus:border-sage">
                        <option>Sort by: Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                    </select>
                </div>

                {{-- Product Grid --}}
                @if (isset($products) && $products->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <a href="{{ route('shop.product_or_category.index', $product->url_key) }}" class="group">
                                <div class="relative overflow-hidden rounded-lg mb-4">
                                    <img
                                        src="{{ $product->base_image_url ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&h=500&fit=crop' }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-80 object-cover group-hover:scale-105 transition duration-500"
                                    >
                                </div>
                                <h3 class="text-sm font-medium text-charcoal group-hover:text-sage transition">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-sm text-charcoal/60 mt-1">
                                    {{ core()->formatPrice($product->price) }}
                                </p>
                            </a>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <p class="text-charcoal/60">No products found in this category.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection