<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
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
                <a href="index-2.html" class="navbar-brand"><img src="assets/img/logo.png" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ads') }}">
                            Advertisments
                        </a>
                    <li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ad') }}">
                            Single
                        </a>
                    <li>
                </ul>
                <div class="post-btn">
                    <a class="btn btn-common" href="{{ route('login') }}"><i class="lni-pencil-alt"></i> Log In</a>
                </div>
                <div class="post-btn">
                    <a class="btn btn-common" href="{{ route('register') }}"><i class="lni-pencil-alt"></i> Register</a>
                </div>
                <div class="post-btn">
                    <a class="btn btn-common" href="{{ route('post-ad') }}"><i class="lni-pencil-alt"></i> Post an Ad</a>
                </div>
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
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                    <div class="widget">
                        <div class="footer-logo"><img src="assets/img/logo.png" alt=""/></div>
                        <div class="textwidget">
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui
                                ratione voluptatem sequi nesciunt consectetur, adipisci velit.
                            </p>
                        </div>
                        <ul class="mt-3 footer-social">
                            <li>
                                <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
                            </li>
                            <li>
                                <a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a>
                            </li>
                            <li>
                                <a class="google-plus" href="#"><i class="lni-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">Quick Link</h3>
                        <ul class="menu">
                            <li><a href="#">- About Us</a></li>
                            <li><a href="#">- Blog</a></li>
                            <li><a href="#">- Events</a></li>
                            <li><a href="#">- Shop</a></li>
                            <li><a href="#">- FAQ's</a></li>
                            <li><a href="#">- About Us</a></li>
                            <li><a href="#">- Blog</a></li>
                            <li><a href="#">- Events</a></li>
                            <li><a href="#">- Shop</a></li>
                            <li><a href="#">- FAQ's</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">Contact Info</h3>
                        <ul class="contact-footer">
                            <li>
                                <strong><i class="lni-phone"></i></strong
                                ><span
                                >+1 555 444 66647 <br/>
                      +1 555 444 66647</span
                                >
                            </li>
                            <li>
                                <strong><i class="lni-envelope"></i></strong
                                ><span
                                ><a
                                        href="http://preview.uideck.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="cdaea2a3b9acaeb98da0aca4a1e3aea2a0"
                                    >[email&#160;protected]</a
                                    >
                      <br/>
                      <a
                          href="http://preview.uideck.com/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="d8abada8a8b7aaac98b5b9b1b4f6bbb7b5"
                      >[email&#160;protected]</a
                      ></span
                                >
                            </li>
                            <li>
                                <strong><i class="lni-map-marker"></i></strong
                                ><span
                                ><a href="#">9870 St Vincent Place, Glasgow, DC 45 <br/>Fr 45</a></span
                                >
                            </li>
                        </ul>
                    </div>
                </div>
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
<script src="{{ asset('js/form-validator.min.js') }}"></script>
<script src="{{ asset('js/summernote.js') }}"></script>

</body>
</html>
