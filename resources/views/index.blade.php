@extends('home.layouts.main')
@section('content')
    <!-- Start Header Section -->
    <header class="cs-site__header cs-style1">
        <div class="cs-main__header">
            <div class="container">
                <div class="cs-main__header__in">
                    <div class="cs-main__header__left d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor"
                            class="bi bi-input-cursor-text" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M5 2a.5.5 0 0 1 .5-.5c.862 0 1.573.287 2.06.566.174.099.321.198.44.286.119-.088.266-.187.44-.286A4.165 4.165 0 0 1 10.5 1.5a.5.5 0 0 1 0 1c-.638 0-1.177.213-1.564.434a3.49 3.49 0 0 0-.436.294V7.5H9a.5.5 0 0 1 0 1h-.5v4.272c.1.08.248.187.436.294.387.221.926.434 1.564.434a.5.5 0 0 1 0 1 4.165 4.165 0 0 1-2.06-.566A4.561 4.561 0 0 1 8 13.65a4.561 4.561 0 0 1-.44.285 4.165 4.165 0 0 1-2.06.566.5.5 0 0 1 0-1c.638 0 1.177-.213 1.564-.434.188-.107.335-.214.436-.294V8.5H7a.5.5 0 0 1 0-1h.5V3.228a3.49 3.49 0 0 0-.436-.294A3.166 3.166 0 0 0 5.5 2.5.5.5 0 0 1 5 2z" />
                            <path
                                d="M10 5h4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-4v1h4a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-4v1zM6 5V4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v-1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4z" />
                        </svg>
                        <a class="cs-site__branding" href="#">
                            <h3 class="ms-3 mb-0">SIMAK</h3>
                        </a>
                    </div>
                    <div class="cs-main__header__right">
                        <div class="cs-nav">
                            <ul class="cs-nav__list">

                                @guest()
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}"><strong>Register</strong></a></li>
                                @endguest
                                @auth
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('logouts') }}">Logout</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Section -->

    <!-- Start Hero -->
    <div class="cs-hero cs-style1 cs-center">
        <div class="container">
            <div class="cs-hero__text wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.3s">
                <h1 class="cs-hero__title">Sistem Manajemen <br>Kuesioner</h1>
                <div class="cs-hero__subtitle">Create your questionnaire here! Easy, Instant, and Effective.
                    <br><strong>Register Now!</strong></div>
                <div class="cs-btns cs-style1">
                    <a href="{{ route('dashboard') }}" class="cs-btn cs-style1 cs-color1 cs-primary__font">
                        <span class="cs-btn__text">Start</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="cs-hero__img cs-parallax">
            <div class="cs-to__right"><img src="{{ asset('images/hero_undraw.svg') }}" alt="Hero Image"></div>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Start Logo Carousel -->
    <div class="container">
        <div class="cs-height__120 cs-height__lg__70"></div>
        <div class="cs-height__70 cs-height__lg__50"></div>
        <div class="cs-height__130 cs-height__lg__70"></div>
    </div>
    <!-- End Logo Carousel -->

    <!-- Footer Section -->
    <footer class="cs-footer cs-style1 cs-parallax">
        <div class="cs-copyright text-center">
            <div class="container">© 2023 - SIMAK By Roshit. All Rights Reserved.</div>
        </div>
    </footer>
    <!-- Footer Section -->
@endsection