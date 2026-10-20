
<header class="native-header w-full">
    {{-- Top bar --}}
    <div class="native-header__top">
        <p>Diseño atemporal · Materiales nobles · Calidad en cada detalle</p>
    </div>

    {{-- Main header --}}
    <div class="native-header__main">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-5 lg:px-8">

            {{-- Brand --}}
            <a href="{{ route('shop.home.index') }}"
               class="native-header__brand">
                <span class="native-header__brand-name">
                    {{ __('native-house::app.brand.name') }}
                </span>
                <span class="native-header__brand-tagline">
                    {{ __('native-house::app.brand.tagline') }}
                </span>
            </a>

            {{-- Search --}}
            <form action="{{ route('shop.search.index') }}"
                  method="GET"
                  class="native-header__search hidden md:flex">
                <input
                    type="search"
                    name="query"
                    placeholder="Buscar muebles..."
                    aria-label="Buscar productos"
                >
                <button type="submit" aria-label="Buscar">
                    <span class="icon-search" aria-hidden="true"></span>
                </button>
            </form>

            {{-- Actions --}}
            <div class="native-header__actions">
                <a href="{{ route('shop.customer.session.index') }}"
                   class="native-header__action"
                   aria-label="Mi cuenta">
                    <span class="icon-users" aria-hidden="true"></span>
                    <span class="hidden lg:inline">Mi cuenta</span>
                </a>

                <a href="{{ route('shop.checkout.cart.index') }}"
                   class="native-header__action"
                   aria-label="Mi carrito">
                    <span class="icon-cart" aria-hidden="true"></span>
                    <span class="hidden lg:inline">Carrito</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="native-header__nav" aria-label="Navegación principal">
        <div class="mx-auto flex max-w-7xl items-center justify-center gap-8 px-5 lg:px-8">
            <a href="{{ route('shop.home.index') }}">Inicio</a>
            <a href="{{ url('/furniture') }}">Muebles</a>
        </div>
    </nav>
</header>
