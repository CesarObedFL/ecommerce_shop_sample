<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ bagisto_asset('images/favicon.ico') }}" type="image/x-icon">

    <title>@yield('title', config('app.name'))</title>

    @stack('meta')

    @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])
</head>
<body class="bg-cream text-charcoal font-body antialiased">
    @include('native-house::partials.header')

    <main>
        @yield('content')
    </main>

    @include('native-house::partials.footer')

    @stack('scripts')
</body>
</html>