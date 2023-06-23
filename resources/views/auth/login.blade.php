@extends('layouts.app')
@section('head')
<meta name="description"
    content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>Login - Preprod Dev</title>
<link rel="stylesheet" href="{{ URL::asset('css/login.css?v=').time() }}">
@endsection
@section('content')
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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="email" name='email' id="form2Example1" class="form-control" />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Şifre</label>
                            <input type="password" name='password' id="form2Example2" class="form-control" />
                        </div>
                        <!-- Submit button -->

                        <button type="submit" class="login-btn">Giriş</button>
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p class="text">Üye değil misiniz? <a href="{{route('register')}}">Kayıt ol</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>

@endsection