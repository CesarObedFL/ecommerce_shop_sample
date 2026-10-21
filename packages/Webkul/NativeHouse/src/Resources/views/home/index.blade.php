@extends('shop::components.layouts.base')

@section('content')
    @foreach ($sections as $section)
        @php ($data = $section->options) @endphp

        @switch ($section->type)
            
            @case ('hero_banner')
                @if (! empty($data['slides']))
                    @foreach ($data['slides'] as $slide)
                        @php
                            $urls = bagisto_theme_storage()->imageUrls($slide['image'] ?? null);
                            $image = $urls['srcset']['large'] ?? $urls['url'] ?? '';
                        @endphp

                        <section class="native-home__hero">
                            @if ($image)
                                <img src="{{ $image }}"
                                    alt="{{ $slide['heading'] ?? 'Colección de muebles Casa Nativa' }}"
                                    class="native-home__hero-image">
                            @endif

                            <div class="native-home__hero-overlay"></div>

                            <div class="native-home__hero-content">
                                <span class="native-home__eyebrow">
                                    Diseño para vivir mejor
                                </span>

                                <h1>
                                    {{ $slide['heading'] ?? 'Espacios con personalidad' }}
                                </h1>

                                <p>
                                    Piezas cuidadosamente seleccionadas para crear
                                    espacios cálidos, elegantes y atemporales.
                                </p>

                                <a href="{{ $slide['link'] ?? url('/furniture') }}" class="native-home__hero-button">
                                    Descubrir colección
                                    <span aria-hidden="true">→</span>
                                </a>
                            </div>

                            <div class="native-home__hero-index">
                                CASA NATIVA <span>·</span> DISEÑO ATEMPORAL
                            </div>
                        </section>
                    @endforeach
                @endif
                @break


            @case (\Webkul\Theme\Enums\SectionTypeEnum::CATEGORY_CAROUSEL->value)

                <v-categories-carousel>
                    <div class="native-home__categories-loading"></div>
                </v-categories-carousel>

                @pushOnce('scripts')
                    <script type="text/x-template" id="v-categories-carousel-template">
                        <section
                            class="native-home__categories container"
                            v-if="! isLoading && categories.length"
                        >
                            <header class="native-home__section-heading">
                                <span>EXPLORA NUESTRA SELECCIÓN</span>
                                <h2>Encuentra tu estilo</h2>
                                <p>Detalles que transforman cada espacio.</p>
                            </header>

                            <div class="native-home__category-grid">
                                <a
                                    v-for="category in categories"
                                    :key="category.id"
                                    :href="'/' + category.slug"
                                    class="native-home__category-card"
                                >
                                    <img
                                        :src="
                                            category.banner?.large_image_url
                                            || category.logo?.large_image_url
                                            || fallback
                                        "
                                        :alt="
                                            category.banner?.alt
                                            || category.logo?.alt
                                            || category.name
                                        "
                                        loading="lazy"
                                    >

                                    <div class="native-home__category-overlay">
                                        <span v-text="category.name"></span>
                                        <span class="native-home__category-arrow">↗</span>
                                    </div>
                                </a>
                            </div>
                        </section>
                    </script>

                    <script type="module">
                        app.component('v-categories-carousel', {
                            template: '#v-categories-carousel-template',

                            data() {
                                return {
                                    isLoading: true,
                                    categories: [],
                                    fallback: "{{ product_image()->getPlaceholderUrl('small') }}",
                                };
                            },

                            mounted() {
                                this.getCategories();
                            },

                            methods: {
                                getCategories() {
                                    this.$axios.get('/api/categories')
                                        .then(response => {
                                            this.categories = (response.data.data || [])
                                                .filter(category =>
                                                    category.id !== 1
                                                    && category.parent_id !== null
                                                    && category.status
                                                );

                                            this.isLoading = false;
                                        })
                                        .catch(error => {
                                            this.isLoading = false;

                                            console.error(
                                                'Error al cargar categorías:',
                                                error
                                            );
                                        });
                                },
                            },
                        });
                    </script>
                @endPushOnce

                @break

        @endswitch
    @endforeach

    @if ($preview ?? false)
        @include('shop::home.preview-bridge')
    @endif
@endsection