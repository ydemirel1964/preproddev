@extends('layouts.app')
@section('head')
<meta name="description" content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir."/>
<meta name="keywords" content="preprod dev,preprod,dev,web tasarım, yazılım, software, yazılım geliştirme">
<title>Profil - Preprod Dev</title>
<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/article.css') }}">
@endsection
@section('content')
<div class="writer-profile" style="margin-bottom: 100px;">
<div class="w3-row">
<div class="w3-col l12 s12">
  <div class="w3-center">
<b><h1>{{$userarticles[0]->users->name}}</b>   yazarına ait yazılar </h1>
</div>
<hr>
  <!-- Blog entry -->
  @foreach ($userarticles as $item)
  <div class=" w3-margin">
    <div class="w3-container">
      <div class="article-title"><b><h2>{{$item->content_title}}</h2></b></div>
      <div class="article-description">{{$item->content_description}}, {{$item->created_at}} </div>
    </div>
    <div class="w3-container">
    <div class="article-content"><span class="class-span">{!!$item->content!!}</span></div>
      <div class="w3-row">
        <div class="w3-col m8 s12">
        <a class="article-content-link" href="{{url('article/'.$item->slug)}}"> Yazının tamamı için tıklayınız. » </a>
        </div>
        <div class="w3-col m4 w3-hide-small w3-right">
          <p><span class=" w3-right">Yorumlar  {{ count($item->comments) }}</span></p>
        </div>
      </div>
    </div>
  </div>
  <hr>
  @endforeach
<!-- END BLOG ENTRIES -->
<div class="w3-right">{{ $userarticles->links() }}</div>

</div>
</div>

@endsection
