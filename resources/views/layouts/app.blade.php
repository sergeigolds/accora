<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Accora</title>
</head>
<body>

<header id="header-wrap">
    <nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                        aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                </button>
                <a href="/" class="navbar-brand"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-center">
                    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('ads')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('ads') }}">
                            Advertisments
                        </a>
                    <li>
                </ul>
                @auth
                    <div class="post-btn account-btn {{ (request()->is('account/post-ad')) ? 'active' : '' }}">
                        <a class="btn btn-common" href="{{ route('post-ad') }}"><i class="lni-pencil-alt"></i> Post an
                            Ad</a>
                    </div>
                    <div class="post-btn account-btn {{ (request()->is('account')) ? 'active' : '' }}"
                         style="margin-right: 15px; margin-left: 15px">
                        <a class="btn btn-common" href="{{ route('account') }}"><i class="lni-user"></i> My Account</a>
                    </div>
                    <div class="post-btn account-btn">
                        <form action="{{ route('logout') }}" method="post" id="logout">
                            @csrf
                            <a onclick="$('#logout').submit()" class="btn btn-common"><i
                                    class="lni-enter"></i> Logout</a>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="post-btn account-btn {{ (request()->is('login')) ? 'active' : '' }}"
                         style="margin-right: 15px">
                        <a class="btn btn-common" href="{{ route('login') }}"><i class="lni-pencil-alt"></i> Log In</a>
                    </div>
                    <div class="post-btn account-btn {{ (request()->is('register')) ? 'active' : '' }}">
                        <a class="btn btn-common" href="{{ route('register') }}"><i class="lni-pencil-alt"></i> Register</a>
                    </div>
                @endguest
            </div>
        </div>

        <ul class="mobile-menu">
            <li>
                <a class="active" href="#">
                    Home
                </a>
                <ul class="dropdown">
                    <li><a class="active" href="index-2.html">Home 1</a></li>
                    <li><a href="index-3.html">Home 2</a></li>
                </ul>
            </li>
            <li>
                <a href="category.html">Categories</a>
            </li>
            <li>
                <a href="#">
                    Listings
                </a>
                <ul class="dropdown">
                    <li><a href="adlistinggrid.html">Ad Grid</a></li>
                    <li><a href="adlistinglist.html">Ad Listing</a></li>
                    <li><a href="ads-details.html">Listing Detail</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="ads-details.html">Ads Details</a></li>
                    <li><a href="post-ads.html">Ads Post</a></li>
                    <li><a href="pricing.html">Packages</a></li>
                    <li><a href="testimonial.html">Testimonial</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="404.html">404</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Blog</a>
                <ul class="dropdown">
                    <li><a href="blog.html">Blog - Right Sidebar</a></li>
                    <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                    <li><a href="blog-grid-full-width.html"> Blog full width </a></li>
                    <li><a href="single-post.html">Blog Details</a></li>
                </ul>
            </li>
            <li>
                <a href="contact.html">Contact Us</a>
            </li>
        </ul>

    </nav>
</header>


@yield('content')

<footer>
    <section class="footer-Content">
        <div class="container">
            <div class="row justify-content-center">
                <p>Copyright © 2022 Accora. All Rights Reserved</p>
            </div>
        </div>
    </section>
</footer>


<a href="#" class="back-to-top">
    <i class="lni-chevron-up"></i>
</a>

{{--<div id="preloader">--}}
{{--    <div class="loader" id="loader-1"></div>--}}
{{--</div>--}}

<script src="{{ asset('js/jquery-min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/color-switcher.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/summernote.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
