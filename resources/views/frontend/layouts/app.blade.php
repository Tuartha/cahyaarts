<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'cahyaarts_baliqui sanggarseni dibali jasa gamelan denpasar CahyaArtBaliqui')" />
    <title>@yield('title', 'CahyaArtBaliqui')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/' . $siteLogo) }}" sizes="32x32" type="image/png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.4.0/fonts/remixicon.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Kaushan+Script&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js', 'resources/css/swiper-bundle-min.css'])
</head>

<body class="bg-gray-900">
    <!-- Header -->
    @include('frontend.partials.navigation')

    <!-- Main Content -->
    <main class="max-w-[1920px] mx-auto bg-white overflow-hidden pt-[90px]">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('frontend.partials.footer')

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script>
        window.va =
            window.va ||
            function() {
                (window.vaq = window.vaq || []).push(arguments);
            };
    </script>
</body>

</html>
