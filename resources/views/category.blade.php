@extends('layouts.app')
@section('head')
<meta name="description" content="{{$category_name}} Kategorisine ait yazılar içermektedir." />
@if(isset($article_categories[$category_name][0]['metatags']))
<meta name="keywords" content="{{$article_categories[$category_name][0]['metatags']}}" />
@endif
<title>{{$category_name}} - Preprod Dev</title>
<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/article.css') }}">
@endsection
@section('content')
<div class="category">
  <div class="w3-row">
    @include('components.categorycomponent')
    <div class="w3-col l9 s12">
      <div class="w3-center">
        <h1>{{$category_name}}</h1>
    </div>
    @if(!empty($category_description))
    <div class="card-body">

      <div class="w3-center">
        <p>{{$category_description}}</p>
      </div>

    </div>
    @endif
    <!-- Blog entry -->
    @foreach ($article_categories as $key=>$articles)
    <div class="w3-margin">
      <h2><b>{{$key}} </b></h2>
      <br>
      @foreach($articles as $article)
      <div class="w3-container">
        <div class="article-title"><b> <a href="{{url('article/'.$article['slug'])}}">
              <h2>{{$article['content_title']}}</h2>
            </a></b> </div>
        <div class="article-writer">Yazar : <a class="article-writer-link" href="/writerprofile/{{$article['user_id']}}">{{$article['name']}} </a>- {{$article['created_at']}}</div>
      </div>
      <br>
      @endforeach
    </div>
    <hr>
    @endforeach
  </div>
  <!-- END w3-content -->
</div>
</div>
@endsection