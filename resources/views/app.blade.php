<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <link rel="manifest" href="/site.webmanifest">

    {{--Не индексировать если не prod--}}
    @if(!App::environment('production'))
        <meta name="robots" content="noindex">
    @endif

    <meta property="og:type" content="website">
    <meta property="og:title" content="Сервис отзывов на арендное жильё в Гродно - Rent Ratings">
    <meta property="og:description"
          content="Просматривайте отзывы на квартиры или другое арендное жильё. Делитесь своим опытом проживания в нём. Rent Ratings помогает не ошибиться при выборе жилья.">
    <meta property="og:url" content="https://rent-ratings.by">
    <meta property="og:image" content="https://rent-ratings.by/og-image.webp">
    <meta property="og:site_name" content="Rent Ratings">
    <meta property="og:locale" content="ru_RU">

    {{--Для предотвращения отображения второго title в случае с ssr страницей. В данном случае это главная--}}
    @if(!Request::is('/'))
        <title inertia>{{ config('app.name') }}</title>
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito-sans:800|roboto:400,500,700&display=swap"
          rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/js/app.js', "resources/js/pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased">
@inertia

@if(App::environment('production'))
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4M788TTTTE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-4M788TTTTE');
    </script>
@endif
</body>
</html>
