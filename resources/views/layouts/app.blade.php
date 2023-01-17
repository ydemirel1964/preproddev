<!doctype html>
<html prefix="og: https://ogp.me/ns#" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Adsense Etiketi  -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9579347278267224" crossorigin="anonymous"></script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-6HPCJ8LJ9C"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-6HPCJ8LJ9C');
  </script>
  <meta name="generator" content="All in One SEO (AIOSEO) 4.2.4 ">
  <!-- Yandex -->
  <meta name="yandex-verification" content="0caaeca8d31605b5" />
  <!-- Meta Tagları Başlangış-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script type="text/javascript" async="" defer="" src="https://analytics.knmp.nl/matomo.js"></script>
  <script>
    var _paq = window._paq || [];
    _paq.push(['requireCookieConsent']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u = "https://analytics.knmp.nl/";
      _paq.push(['setTrackerUrl', u + 'matomo.php']);
      _paq.push(['setSiteId', '19']);
      var d = document,
        g = d.createElement('script'),
        s = d.getElementsByTagName('script')[0];
      g.type = 'text/javascript';
      g.async = true;
      g.defer = true;
      g.src = u + 'matomo.js';
      s.parentNode.insertBefore(g, s);
    })();
  </script>
   <script>
    function submit_form(){
        var form = document.getElementById("logoutForm");
        form.submit();
    }
    </script>

  <link rel="icon" type="image/png" href="{{ asset('img/preproddev.webp') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/preproddev.webp') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/w3.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  @yield('head')
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="w3-center" style="margin: 15px 15px 15px 15px;">
        Kendinize zaman ayırın ve kendinize yatırım yapın
      </div>
    </div>
  </div>

  
    <div class="row bg-light">
    <div class="container-fluid">
      <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light " style="padding:20px 20px 20px 20px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link navbar-brand" href="/"><b style="color:black;">PREPROD-DEV</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/hakkimda">Hakkımızda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/iletisim">İletişim</a>
            </li>
          </ul>
          <ul class="nav navbar-nav mx-auto">
          <ul>
              <form action="{{ url('searchresult') }}" method="get">
                <input class="form-control" type="search" name="searchTerm" placeholder="Arama alanı" style="width: 300px;" aria-label="Search">
            </ul>
            <ul>
              <button class="btn btn-outline-success" type="submit">Ara</button>
            </ul>
            </form>
          </ul>
          <ul class="nav navbar-nav">
           
            <ul>
              @if(Auth::user())
              
               
                <div class="dropdown">
                  <button type="button" data-bs-toggle="dropdown" class="btn btn-outline-success">Profil
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('userProfile')}}">Profil</a></li>
                    <li><a class="dropdown-item" href="#"> 
                    <form method="POST" id='logoutForm' action="{{ route('logout') }}">
                    @csrf
                      <div onclick="submit_form()">
                      Çıkış Yap</div>
                    </form>
                    </a></li>
  
                  </ul>
                </div>
  
              @else
              <form method="GET" action="{{ route('login') }}">
                @csrf
                <button type="submit" class="btn btn-outline-success">
                  Giriş Yap
                </button>
              </form>
            </ul>
            <ul>
              <form method="GET" action="{{ route('register') }}">
                @csrf
                <button type="submit" class="btn btn-outline-success">
                  Üye Ol
                </button>
              </form>
            </ul>
            @endif
          </ul>
        </div>
      </nav>
    </div>
    </div>
  </div>
  <div class="container">
    <main class="py-4">
      @yield('content')
    </main>
  </div>
  <div class="bg-light footer fixed-bottom">
    <div class="text-center p-4"">
        © 2022 Copyright:
        <a class=" text-reset fw-bold" href="https://www.preproddev.com/">preproddev.com</a>
    </div>
  </div>
  </div>
</body>

</html>