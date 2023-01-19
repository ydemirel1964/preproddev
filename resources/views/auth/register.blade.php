@extends('layouts.app')
@section('head')
<meta name="description" content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>Anasayfa - Preprod Dev</title>
<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/article.css') }}">
@endsection
@section('content')
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
    <br><br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label">Kullanıcı Adı</label>
            <input type="text" name='name' class="form-control" />
        </div>
         <!-- Email input -->
         <div class="form-outline mb-4">
            <label class="form-label">Email</label>
            <input type="email" name='email' class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label">Şifre</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />

        </div>
         <!-- Password input -->
         <div class="form-outline mb-4">
            <label class="form-label">Şifre Tekrarı</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">  Kayıt  </button>
        <!-- Register buttons -->
        <div class="text-center">
            <p>Üye misiniz? <a href="{{route('login')}}">  Giriş Yap  </a></p>
        </div>
    </form>
        </div>
<div class="col-md-4"></div>
</div>
@endsection