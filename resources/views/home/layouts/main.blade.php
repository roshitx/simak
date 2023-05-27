<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Title -->
    <title>SIMAK | Sistem Manajemen Kuesioner</title>
    {{-- Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/lightgallery.min.css">
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/animated-headline.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://kit.fontawesome.com/024c1ae29f.js" crossorigin="anonymous"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="cs-preloader">
        <div class="cs-preloader__in">
            <img src="{{ asset('images/logo_simak_black.svg') }}" width="50">
        </div>
    </div>
    @yield('content')
    <div id="cs-scrollup"><i class="fas fa-chevron-up"></i></div>
    <!-- Script -->
    <script src="/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/isotope.pkg.min.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/jquery.slick.min.js"></script>
    <script src="/assets/js/lightgallery.min.js"></script>
    <script src="/assets/js/jquery.counter.min.js"></script>
    <script src="/assets/js/select2.min.js"></script>
    <script src="/assets/js/ripples.min.js"></script>
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script src="/assets/js/animated-headline.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
