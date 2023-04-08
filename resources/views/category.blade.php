@extends('layouts.app')
@section('head')
<meta name="description" content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>{{ $category_name }} - Preprod Dev</title>
@endsection
@section('content')

<main class="site-main">

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          @foreach ($article_categories as $key=>$articles)
          <div class="row">
            <h1 class="category-title"> {{ $key }}</h1> 
          </div>
          <hr>
          <br>
            @foreach($articles as $article)
          <a href="{{url('article/'.$article['slug']) }}">
            <h2 class="category-article-title">{{ $article['content_title'] }}</h2>
          </a>
          <div>
            <div class="details mt-20">
              <p class="content-description">{!! $article['content_description'] !!}</p>
            </div>
          </div>
            @endforeach
          @endforeach
        </div> 

        <!-- Start Blog Post Siddebar -->
        <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">
            <div class="single-sidebar-widget post-category-widget">
             <div class="text-center single-sidebar-widget__title"> Kategoriler </div>
              <ul class="cat-list mt-20">
                @foreach($popularCategories as $category)
                <li>
                  <a href="{{ url('category', ['id' => $category->slug]) }}" class="d-flex justify-content-between">
                    <h3 class="sidebar-h3-title">{{ $category->category }}</h3>
                    <p>{{ $category->category_count}}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>

            <div class="single-sidebar-widget popular-post-widget">
              <div class="text-center single-sidebar-widget__title">Yazılar</div>
              <div class="popular-post-list">
                @foreach($allArticles as $post)
                <br>
                <div class="single-post-list">
                  <div class="thumb">
                    <ul class="thumb-info">
                      <li><!-- <a href="#"> --> {{ $post->users->name }} <!-- </a> --></li>
                      <li><!-- <a href="#"> --> {{ $post->created_at->format('Y-m-d') }} <!-- </a> --></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="{{ url('article', ['id' => $post->slug]) }}">
                      <h3 class="sidebar-h3-title">{{ $post->content_title }}</h3>
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
  </section>
</main>
@endsection