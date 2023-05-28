@extends('layouts.app')
@section('head')
@if(isset($articles[0]->content_description))
<meta name="description" content="{{$articles[0]->content_description}}}}" />
<title>{{ $articles[0]->content_title}} - Preprod Dev</title>
<meta name="keywords" content='{{ $articles[0]->metatags}}'>
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
        <div class="main_blog_details">
          <div class="article_article_title_div">
          <h1> {{$article->content_title}}</h1>
        </div>
          <div class="user_details">
            <div class="float-right mt-sm-0 mt-3">
              <div class="media">
                <div class="media-body">
                  <h5>{{ $article->users->name }}</h5>
                  <p>{{ $article->created_at }}</p>
                </div>
              </div>
            </div>
          </div>
          <div id="article_content">
            {!! $article->content !!}
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