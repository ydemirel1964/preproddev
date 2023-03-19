@extends('layouts.app')
@section('head')
@if(isset($articles[0]->content_description))
<meta name="description" content="{{$articles[0]->content_description}}}}"/>
<title>{{ $articles[0]->content_title}} - Preprod Dev</title>
<meta name="keywords" content='{{ $articles[0]->metatags}}'>
<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/article.css') }}">
@endif
@endsection
@section('content')
  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin mt-4">
    <div class="container">
    @foreach ($articles as $key=>$article)
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <h1>   {{$article->content_title}}</h1>
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
                <div style="overflow:auto">
                {!! $article->content !!}
                </div>
              </div>
        </div>
            <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">
            <div class="single-sidebar-widget post-category-widget">
              <h3 class="single-sidebar-widget__title"><div class="text-center"> Kategoriler </div></h3>
              <ul class="cat-list mt-20">
                @foreach($popularCategories as $category)
                <li>
                  <a href="{{ url('category', ['id' => $category->slug]) }}" class="d-flex justify-content-between">
                    <h4 class="side-category-title"> <p>{{ $category->category }}</p></h4>
                    <p>{{ $category->category_count}}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="single-sidebar-widget popular-post-widget">
              <h3 class="single-sidebar-widget__title"><div class="text-center">Yazılar</div></h3>
              <div class="popular-post-list">
                @foreach($allArticles as $post)
                <br>
                <div class="single-post-list">
                  <div class="thumb">
                    <ul class="thumb-info">
                      <li><a href="#">{{ $post->users->name }}</a></li>
                      <li><a href="#">{{ $post->created_at->format('Y-m-d') }}</a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="{{ url('article', ['id' => $post->slug]) }}">
                      <h4 class="side-article-title">{{ $post->content_title }}</h4>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
            </div>
          </div>
        <!-- End Blog Post Siddebar -->
        @endforeach
      </div>
  </section>

@endsection
