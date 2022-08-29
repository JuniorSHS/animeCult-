<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    @php
    $setting = App\Models\Paremetres::find(1);
    @endphp
    <link rel="shortcut icon" href="{{ asset('uploads/settings/'.$setting->favicon_site) }}" type="image/x-icon">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">






</head>
<body>
    <div id="app">

        {{-- @include('layouts.inc.frontend-navbar') --}}

        <main class="">
            @yield('content')

        </main>

        {{-- @include('layouts.inc.frontend-footer') --}}

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    
    <script>
        $('.category-carousel').owlCarousel({
        loop: true,
        center: true,
        margin: 10,
        responsiveClass: true,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        dots: false,
        responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        1000:{
            items:5,
            nav:true,
            loop:true
        }
        }
        })
    </script>

<script>
    $('.category-carousel2').owlCarousel({
    loop: true,
    center: true,
    margin: 10,
    responsiveClass: true,
    autoplay:false,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    dots: false,
    responsive:{
    0:{
        items:1,
        nav:true,
        autoplay:false,
        loop: false

    },
    600:{
        items:3,
        nav:true,
        autoplay:true
    },
    1000:{
        items:5,
        loop: false,
        nav:false,
        loop:true
    }
    }
    })
</script>

</body>
</html>
