<footer class="w-full bg-charcoal text-cream mt-24">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-lg font-display mb-4">
                {{ __('native-house::app.brand.name') }}
            </h3>
            <p class="text-sm text-sand">
                {{ __('native-house::app.brand.tagline') }}
            </p>
        </div>

        <div>
            <h4 class="text-sm font-semibold mb-4 uppercase tracking-wider">Shop</h4>
            <ul class="space-y-2 text-sm text-sand">
                <li><a href="#" class="hover:text-sage">Furniture</a></li>
                <li><a href="#" class="hover:text-sage">Lighting</a></li>
                <li><a href="#" class="hover:text-sage">Textiles</a></li>
                <li><a href="#" class="hover:text-sage">Plants</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-sm font-semibold mb-4 uppercase tracking-wider">About</h4>
            <ul class="space-y-2 text-sm text-sand">
                <li><a href="#" class="hover:text-sage">Our Story</a></li>
                <li><a href="#" class="hover:text-sage">Sustainability</a></li>
                <li><a href="#" class="hover:text-sage">Journal</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-sm font-semibold mb-4 uppercase tracking-wider">Contact</h4>
            <ul class="space-y-2 text-sm text-sand">
                <li>hello@casanativa.com</li>
                <li>+52 55 1234 5678</li>
            </ul>
        </div>
    </div>

    <!-- Copyright -->
    <div class="native-footer__bottom">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-6 py-5 text-center sm:flex-row sm:text-left lg:px-8">
            <p class="native-footer__copyright text-xs">
                &copy; {{ date('Y') }}
                {{ __('native-house::app.brand.name') }}.
                Todos los derechos reservados.
            </p>

            <p class="native-footer__signature text-xs">
                Diseño y desarrollo por
                <span>César Obed Figueroa Luna</span>
            </p>
        </div>
    </div>
</footer>