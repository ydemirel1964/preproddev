<!doctype html>
<html prefix="og: https://ogp.me/ns#" lang="tr">

<head>
    <link rel="stylesheet" href="{{ URL::asset('vendors/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css?v=').time() }}">
    <meta name="yandex-verification" content="0caaeca8d31605b5" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/preproddev.webp') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/preproddev.webp') }}">
    <!--  Adsense Etiketi -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9579347278267224"
        crossorigin="anonymous"></script><!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6HPCJ8LJ9C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-6HPCJ8LJ9C');
    </script>
    <meta name="generator" content="All in One SEO (AIOSEO) 4.2.4 " />
    @yield('head')
</head>

<body>
    <header class="header_area">
        <div class="container">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav">
                                <li class="nav-item active"><a class="nav-link title" href="/">Preprod-Dev</a>
                                </li>
                                <!--<li class="nav-item justify-content-center"><a class="nav-link"
                                        href="{{ url('hakkimizda') }}">Hakkımızda</a></li>
                                <li class="nav-item justify-content-center"><a class="nav-link"
                                        href="{{ url('iletisim') }}">İletişim</a></li> -->
                            </ul>
                            <ul class="nav navbar-nav navbar-right navbar-social">
                                <li><a href="https://www.facebook.com/people/Preprod-Dev/100089444574092/"><i
                                            class="ti-facebook"></i></a></li>
                                <li><a href="https://twitter.com/PreprodDev"><i class="ti-twitter-alt"></i></a></li>
                                <li><a href="https://www.instagram.com/preproddev/"><i class="ti-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

    </div>
    <!--================ Start Footer Area =================-->
    <footer class="footer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Hakkımızda</h6>
                        <p>
                            Preprod-Dev<br><br> Programlama ve web teknolojileri öncelik olmak üzere farklı konularda
                            yazılar içermektedir.
                        </p>
                    </div>
                </div>
                <div class="col-lg-7  col-md-6 col-sm-6"></div>
                <!--
          <div class="col-lg-5  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Haber Bülteni</h6>
            <p>Son eklenen yazılar ile ilgili bilgi almak için mail adresinizi bırakabilirsiniz.</p>
            <div class="" id="mc_embed_signup">

              <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                <div class="d-flex flex-row">

                  <input class="form-control" name="EMAIL" placeholder="Email Adresinizi Giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Adresinizi Giriniz'" required="" type="email">


                  <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                  <div style="position: absolute; left: -5000px;">
                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                  </div>
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div> -->

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Bizi Takip Et</h6>
                        <div class="footer-social d-flex align-items-center">
                            <a href="https://www.facebook.com/people/Preprod-Dev/100089444574092/">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/PreprodDev">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.instagram.com/preproddev/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved PreprodDev </a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!--================ End Footer Area =================-->
    <script src="{{ URL::asset('vendors/main.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>

</body>

</html>
