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
<meta name="author" content="Blog with laravel 10">
                @php 
              $setting= App\Models\Setting::find(1);
              @endphp
<link rel="shortcut icon" href="{{asset('uploads/settings/'.$setting->fevicon)}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">


    
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    </nav>
    @include('layouts.inc.frontend-navbar')
        <main class="">
            @yield('content')
        </main>
        @include('layouts.inc.frontend-footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script>
        $('.category-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>
</body>
</html>