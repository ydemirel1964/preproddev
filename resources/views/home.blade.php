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
            <h4>Preprod Dev</h4>
            <h6>Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir.</h6>
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
                  <h3>{{$article->content_title}}</h3>
                </a>
                <p>{!!$article->content_description!!}</p>
                <p class="content"> {!! $article->content !!} </p>
                <a class="button" href="{{ url('article/'.$article->slug) }}">YAZININ SAYFASINA GİT <i class="ti-arrow-right"></i></a>
              </div>
            </div>
            @endforeach
           
            <!--<div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid" src="img/blog/blog3.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                  <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3>Tourist deaths in Costa Rica jeopardize safe dest
                    ination reputation all time. </h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>-->
            {{ $articles->links() }}
            
          </div>

          <!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                
              <div class="single-sidebar-widget post-category-widget">
                  <h4 class="single-sidebar-widget__title">Kategoriler</h4>
                  <ul class="cat-list mt-20">
                  @foreach($popularCategories as $category)
                    <li>
                      <a href="{{ url('category', ['id' => $category->slug]) }}" class="d-flex justify-content-between">
                        <p>{{ $category->category }}</p>
                        <p>{{ $category->category_count}}</p>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>

                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="single-sidebar-widget__title">Yazılar</h4>
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
                          <h6>{{ $post->content_title }}</h6>
                        </a>
                      </div>
                    </div>
                    @endforeach 
                  </div>
                </div>

                  <!--<div class="single-sidebar-widget tag_cloud_widget">
                    <h4 class="single-sidebar-widget__title">Etiketler</h4>
                    <ul class="list">
                      <li>
                          <a href="#">project</a>
                      </li>
                      <li>
                          <a href="#">love</a>
                      </li>
                      <li>
                          <a href="#">technology</a>
                      </li>
                      <li>
                          <a href="#">travel</a>
                      </li>
                      <li>
                          <a href="#">software</a>
                      </li>
                      <li>
                          <a href="#">life style</a>
                      </li>
                      <li>
                          <a href="#">design</a>
                      </li>
                      <li>
                          <a href="#">illustration</a>
                      </li>
                    </ul>
                  </div>--  >

                  <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Haber Bülteni</h4>
                  <div class="form-group mt-30">
                    <div class="col-autos">
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email Adresinizi Giriniz" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Email Adresinizi Giriniz'">
                    </div>
                  </div>
                  <button class="bbtns d-block mt-20 w-100">Üye ol</button>
                </div>
                </div>
              </div>
            </div>
          <!-- End Blog Post Siddebar -->
        </div>
    </section>
  </main>
@endsection