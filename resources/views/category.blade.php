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
          <div class="row justify-content-center align-self-center">
            <h2 class="center"> <b> {{ $key }}</h2> </b></div>
          <br>
            @foreach($articles as $article)
          <a href="{{url('article/'.$article['slug']) }}">
            <h3 >{{ $article['content_title'] }}</h3>
          </a>
          <div>
            <div class="details mt-20">
              <p>{!! $article['content_description'] !!}</p>
            </div>
          </div>
            @endforeach
          @endforeach
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

           <!-- <div class="single-sidebar-widget tag_cloud_widget">
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
            </div>-->

          <!--  <div class="single-sidebar-widget newsletter-widget">
              <h4 class="single-sidebar-widget__title">Haber Bülteni</h4>
              <div class="form-group mt-30">
                <div class="col-autos">
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email Adresinizi Giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Adresinizi Giriniz'">
                </div>
              </div>
              <button class="bbtns d-block mt-20 w-100">Üye ol</button>
            </div>
-->
          </div>
        </div>
      </div>
      <!-- End Blog Post Siddebar -->
    </div>
  </section>
</main>
@endsection