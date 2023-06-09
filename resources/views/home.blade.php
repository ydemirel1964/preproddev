@extends('layouts.app')
@section('head')
<meta name="description"
    content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>Anasayfa - Preprod Dev</title>
@endsection
@section('content')
<div class="container">
    <h1 style="display: none;">Yazılım Dersleri</h1>
    <section class="blog-post-area section-margin mt-4">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($articles as $key => $article)
                <div class="card">
                    <div class="card-header text-center">
                        <div class="text-left">
                            <div class="user-info-area">{{ $article->users->name }}
                            <p>{{ $article->created_at }}</p></div>
                        </div>
                        <a href="{!! $article->slug !!}">
                            <h2> {{$article->content_title}}</h2>
                        </a>
                        <p class="content-description"> {!! $article->content_description !!}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text article-content"> {!! $article->content !!}</p>
                        <div class="text-right"><a class="button" href="{{ url('/' . $article->slug) }}">YAZININ
                                SAYFASINA GİT <i class="ti-arrow-right"></i></a></div>
                    </div>
                </div>
                @endforeach
                {{ $articles->links() }}
            </div>
            <!-- Start Blog Post Siddebar -->
            @include('layouts.sidebar')
        </div>
    </section>
</div>
@endsection