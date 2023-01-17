@extends('layouts.app')
@section('head')
<meta name="description" content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>Anasayfa - Preprod Dev</title>
<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/article.min.css') }}">
@endsection
@section('content')
<div class="jumbotron p-3 p-md-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-6 font-italic">Preprod Dev</h1>
        <p>Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir.</p>
    </div>
</div>

@include('components.categorycomponent') 
<div class="w3-col l9" style="margin-bottom: 100px;">
    <!-- Blog entry -->
    @foreach ($articles as $key=>$article)
    <div class="w3-margin">
        <div class="w3-container">
            <div class="article-title"><b> <a href="{{url('article/'.$article->slug)}}">
                        <h2 class="home-page-content-title-h2">{{$article->content_title}} </h2>
                    </a></b> - {{$article->created_at}}</div>
            <div class="article-writer">Yazar : <a class="article-writer-link" href="/writerprofile/{{$article->users->id}}">{{$article->users->name}} </a></div>
        </div>
        <div class="w3-container">
            <div class="article-content">
                <span class="class-span">
                    {!!$article->content_description!!}</span>
            </div>
            <div class="w3-row">
                <div class="w3-col m8 s12">
                    <a class="article-content-link" href="{{url('article/'.$article->slug)}}"> Yazının tamamı için
                        tıklayınız. » </a>
                </div>
                <div class="w3-col m4 w3-hide-small w3-right">
                    <p class="comment"><span class="w3-right"> Yorumlar {{ count($article->comments) }} </span></p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @endforeach
    <div class="w3-right">
        {{ $articles->links() }}
    </div>

</div>

@endsection