<!doctype html>
<html lang="tr">

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
    <div class="header1 navbar navbar-light">
        <div class="align-self-center">
            <a href="https://www.facebook.com/people/Preprod-Dev/100089444574092/"><i class="ti-facebook"></i></a>
            <a href="https://twitter.com/PreprodDev"><i class="ti-twitter-alt"></i></a>
            <a href="https://www.instagram.com/preproddev/"><i class="ti-instagram"></i></a>
        </div>
        <div class="align-self-end">
            <!-- Split dropleft button -->
            @if(Auth::check())
            <div class="btn-group">
                <div class="btn-group dropleft" role="group">
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropleft</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Yeni Kategori Ekleme</a>
                        <a class="dropdown-item" href="#">Yeni Yazı Ekleme</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Çıkış Yap</button>
                        </form>
                      
                    </div>
                </div>
                <button type="button" class="btn btn-secondary"> <a href="/profile">Profil</a></button>
            </div>
            @else
            <div class="login_register">
                <a href="/login" class="btn btn-secondary">Giriş Yap</a>
                <a href="/register" class="btn btn-secondary">Kayıt Ol</a>
            </div>
            @endif
        </div>
    </div>
    <header>
        <div class="container">
            <nav class="navbar navbar-light justify-content-between">
                <a href="/" class="navbar-brand">Preprod-Dev</a>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit">##</button>
                </form>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
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
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved PreprodDev </a>
                </p>
            </div>
        </div>
    </footer>
    <script src="{{ URL::asset('vendors/main.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>

</html>