@extends('layouts.app')
@section('head')
@if(isset($articles[0]->content_description))
<meta name="description" content="{{$articles[0]->content_description}}}}" />
<title>{{ $articles[0]->content_title}} - Preprod Dev</title>
@if($articles[0]->metatags !== null)
<meta name="keywords" content='{{ $articles[0]->metatags}}'>
@endif
@endif
@endsection
@section('content')
<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
  <div class="container">
    @if (count($articles)>0)
    @foreach ($articles as $key=>$article)
    <div class="row">
      <div class="col-lg-8">
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
          </div>
      </div>
      </div>
      @include('layouts.sidebar')
    </div>
  </div>
  <!-- End Blog Post Siddebar -->
  @endforeach
  @else()
  <div class="row">
    <div class="col-lg-8">

      <div class="error">
        İlgili Sayfa Bulunamamıştır.
      </div>

    </div>
    @include('layouts.sidebar')
  </div>
  </div>

  @endif

  </div>
</section>

@endsection