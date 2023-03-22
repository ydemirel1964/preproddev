@extends('layouts.app')
@section('head')
<meta name="description" content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="web tasarım, yazılım, software, yazılım geliştirme">
<title>Anasayfa - Preprod Dev</title>
@endsection
@section('content')
<main class="site-main">
    <!--================Hero Banner start =================-->  
    <section class="mb-30px">
      <div class="container">
        <div class="hero-banner">
          <div class="hero-banner__content">
            <h1 id='home-title'>Preprod Dev</h1>
            <p>Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir.</p>
          </div>
        </div>
      </div>
    </section>
       <!--================ Start Blog Post Area =================-->
       <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          @foreach ($articles as $key=>$article)
            <div class="single-recent-blog-post">
              <div class="details mt-20">
                <a href="{{ url('article/'.$article->slug) }}">
                  <h2 class="home-article-title">{{$article->content_title}}</h2>
                </a>
                <p class="content-description"> {!!$article->content_description!!}</p>
                <p class="content"> {!! $article->content !!} </p>
                <a class="button" href="{{ url('article/'.$article->slug) }}">YAZININ SAYFASINA GİT <i class="ti-arrow-right"></i></a>
              </div>
            </div>
            @endforeach
            {{ $articles->links() }}
          </div>

          <!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                
              <div class="single-sidebar-widget post-category-widget">
                <div class="text-center">
                  <div class="text-center single-sidebar-widget__title"> Kategoriler </div>
                  <ul class="cat-list mt-20">
                  @foreach($popularCategories as $category)
                    <li>
                      <a href="{{ url('category', ['id' => $category->slug]) }}" class="d-flex justify-content-between">
                        <h3 class="sidebar-h3-title">{{ $category->category }} </h3>
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
                          <li><a href="#">{{ $post->users->name }}</a></li>
                          <li><a href="#">{{ $post->created_at->format('Y-m-d') }}</a></li>
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
    </section>
  </main>
@endsection