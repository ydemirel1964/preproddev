@extends('layouts.app')
@section('head')
<meta name="description" content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="preprod dev,preprod,dev,web tasarım, yazılım, software, yazılım geliştirme">
<title>İletişim - Preprod Dev</title>
<link rel="stylesheet" href="{{ URL::asset('css/article.min.css') }}">
@endsection
@section('content')
<div class="contact">
    <div class="row justify-content-center">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="w3-center">
                <h1>
                    İletişime Geçin<br>
                    Destek ,talep ve önerilerilerinizi aşağıdaki formdan iletebilirsiniz.
                </h1>
            </div>
            <form action="{{url('/contact/create')}}" method="post">
                @csrf
                <div class="mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Adınız Soyadınız</label>
                            <input class="form-control" name="contactName">
                        </div>
                        <div class="form-group">
                            <label>Mail Adresiniz</label>
                            <input class="form-control" name="contactEmail">
                        </div>
                        <div class="form-group">
                            <label>Konu başlığınız</label>
                            <input class="form-control" name="contactTitle">
                        </div>
                        <div class="form-group">
                            <label>Mesajınız</label>
                            <textarea class="form-control" name="contactBody"> </textarea>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="form-control">Gönder</button>
                                </div>
                            </div>
                            @if(isset($result))
                            @if($result == "success")
                            <p>Mesajınız Gönderildi.</p>
                            @elseif($result == "fail")
                            <p>Mesaj gönderiminiz başarısız.</p>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
@endsection