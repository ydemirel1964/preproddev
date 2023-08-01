<!DOCTYPE html>
<html>

<head>
  <title>PreprodDev Admin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ URL::asset('vendors/main.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
  </link>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="logo">
      <a href="/">Preprod - Dev</a>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="admin-welcome">
          Hoşgeldin, <strong>{{Auth::user()->name}}</strong>
        </div>
        <hr>
        <div class="admin-side-menu">
          <ul>
            <li> <a href="/dashboard"> Genel bakış</a></li>
            <li> <a href="/admin/articles"> Yazılar</a></li>
            <li> <a href="/admin/categories"> Kategoriler</a></li>
            <li> <a href="#"> Etiketler</a></li>
            <li> <a href="/admin/users"> Kullanıcılar</a></li>
            <li> <a href="#"> Yorumlar</a></li>
            <li> <a href="/admin/contact"> İletişim </a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div>
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</body>

</html>