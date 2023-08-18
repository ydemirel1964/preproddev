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
    <p style="display: none;">{{ $category_name }} - Preprod Dev</p>
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
          <a href="{{url('/'.$article['slug']) }}">
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
        @include('layouts.sidebar') 
      </div>
    </div>
  </section>
</main>
@endsection