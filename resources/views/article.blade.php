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
                <div id="article_content">
                {!! $article->content !!}
                </div>
              </div>
        </div>
            <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">
            <div class="single-sidebar-widget post-category-widget">
              <div class="text-center single-sidebar-widget__title"> Kategoriler </div>
              <ul class="cat-list mt-20">
                @foreach($sidebarCategories as $sidebarCategory)
                <li>
                  <a href="{{ url('category', ['id' => $sidebarCategory->slug]) }}" class="d-flex justify-content-between">
                    <p class="text-center single-sidebar-widget__title"> {{ $sidebarCategory->category }} </p>
                    <p>{{ $sidebarCategory->category_count}}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="single-sidebar-widget popular-post-widget">
              <div class="text-center single-sidebar-widget__title">Yazılar</div>
              <div class="popular-post-list">
                @foreach($sidebarArticles as $sidebarArticle)
                <br>
                <div class="single-post-list">
                  <div class="thumb">
                    <ul class="thumb-info">
                      <li><!-- <a href="#"> --> {{ $sidebarArticle->users->name }} <!-- </a> --></li>
                      <li><!-- <a href="#"> --> {{ $sidebarArticle->created_at->format('Y-m-d') }} <!-- </a> --></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="{{ url('', ['id' => $sidebarArticle->slug]) }}">
                      <h4 class="side-article-title">{{ $sidebarArticle->content_title }}</h4>
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
