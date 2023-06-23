@extends('layouts.app')
@section('head')
<meta name="description"
    content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>Register - Preprod Dev</title>
<link rel="stylesheet" href="{{ URL::asset('css/login.css?v=').time() }}">
@endsection
@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 page-info">
        PREPROD-DEV Programlama ve Programlama teknolojileri hakkında yazılar içermektedir. Sizde kayıt
        olarak ve bilgilerinizi paylaşarak siteye ve yeni bilgiler edinmek isteyen kişilere katkıda
        bulunabilirsiniz.
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="login-form-bd">
            <div class="form-wrapper">
                <div class="form-container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}" class="register_form">
                        @csrf
                        <!-- Email input -->
                        <div class="form-group">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input type="text" name='name' class="form-control" />
                        </div>
                        <!-- Email input -->
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name='email' class="form-control" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Şifre</label>
                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>
                        <div class="form-group">

                            <label class="form-label">Şifre Tekrarı</label>
                            <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="login-btn"> Kaydol </button>
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Üye misiniz? <a href="{{route('login')}}"> Giriş Yap </a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection