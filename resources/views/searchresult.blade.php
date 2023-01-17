@extends('layouts.app')
@section('head')
<meta name="description" content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="preprod dev,preprod,dev,web tasarım, yazılım, software, yazılım geliştirme">
<title>Arama Sonuç - Preprod Dev</title>
<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/article.css') }}">
@endsection
@section('content')
<div class="search-result">
  <div class="w3-row">
    <div class="w3-col l12 s12">
      <!-- Blog entry -->
      <div class="w3-center">
        @if (count($searchresult) < 1) <h1>
          <p><b>"{{ $searchTerm }}"</b> kelimesine ait herhangi bir sonuç bulunamamıştır.</p>
          </h1>
          @else
          <h1>
            <p><b>"{{ $searchTerm }}"</b> kelimesine ait arama sonuçları aşağıda listelenmiştir.</p>
          </h1>
          @endif
      </div>
      <hr>
      @foreach ($searchresult as $article)
      <div class="w3-margin">
        <div class="w3-container">
          <h2>
            <div class="article-title"><b>{{$article->content_title}}</b></div>
          </h2>
          <div class="article-description">{{$article->content_description}}, {{$article->created_at}}</div>
          <div class="article-writer">Yazar : <a class="article-writer-link" href="/writerprofile/{{$article->user_id}}">{{$article->users->name}} </a></div>
        </div>
        <div class="w3-container">
          <div class="article-content">
            <span class="class-span">
              {!!$article->content!!}</span>
          </div>
          <div class="w3-row">
            <div class="w3-col m8 s12">
              <a class="article-content-link" href="{{url('article/'.$article->slug)}}"> Yazının tamamı için tıklayınız. » </a>
            </div>
            <div class="w3-col m4 w3-hide-small w3-right">
              <p><span class="w3-right">Yorumlar {{ $article->comments === NULL ? 0 : count($article->comments)}}</span></p>
            </div>
          </div>
        </div>
      </div>
      <hr>
      @endforeach
      <!-- END BLOG ENTRIES -->
      <div class="w3-right">
        {{ $searchresult->links() }}
      </div>
    </div>
    <!-- END w3-content -->
  </div>
</div>
@endsection