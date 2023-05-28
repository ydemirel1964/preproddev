@extends('layouts.app')
@section('head')
<meta name="description"
    content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>Anasayfa - Preprod Dev</title>
@endsection
@section('content')

<div class="container">
    <section class="blog-post-area section-margin mt-4">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($articles as $key => $article)
                <div class="single-recent-blog-post">
                    <div class="details mt-20">
                        <div class="home_article_title_div">
                            <a href="{{ url('/' . $article->slug) }}">
                                <h2 class="home-article-title">{{ $article->content_title }}</h2>
                            </a>
                        </div>
                        <p class="content-description"> {!! $article->content_description !!}</p>
                        <p class="content">
                        <div id="article_content"> {!! $article->content !!}</div>
                        </p>
                        <a class="button" href="{{ url('/' . $article->slug) }}">YAZININ SAYFASINA GİT <i
                                class="ti-arrow-right"></i></a>
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