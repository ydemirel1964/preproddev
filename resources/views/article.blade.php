@extends('layouts.app')
@section('head')
@if(isset($articles[0]->content_description))
<meta name="description" content="{{$articles[0]->content_description}}}}"/>
<title>{{ $articles[0]->content_title}} - Preprod Dev</title>
<meta name="keywords" content='{{ $articles[0]->metatags}}'>
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
                <h4>   {{$article->content_title}}</h4>
                <div class="user_details">
                  <!--<div class="float-left">
                    <a href="#">Lifestyle</a>
                    <a href="#">Gadget</a>
                  </div>-->
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
                 
                <!--<div class="news_d_footer flex-column flex-sm-row">
                 <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a>
                 <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>06 Comments</a>
                 <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
               <a href="#"><i class="fab fa-behance"></i></a>
             </div>
               </div>-->
              </div>
          

          <!--<div class="navigation-area">
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                          <div class="thumb">
                              <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                          </div>
                          <div class="arrow">
                              <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                          </div>
                          <div class="detials">
                              <p>Prev Post</p>
                              <a href="#"><h4>A Discount Toner</h4></a>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                          <div class="detials">
                              <p>Next Post</p>
                              <a href="#"><h4>Cartridge Is Better</h4></a>
                          </div>
                          <div class="arrow">
                              <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                          </div>
                          <div class="thumb">
                              <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                          </div>										
                      </div>									
                  </div>
                </div>-->
                <!--
                <div class="comments-area">
                    <h4>05 Comments</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c1.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a> 
                            </div>
                        </div>
                    </div>	
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c2.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Elsie Cunningham</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a> 
                            </div>
                        </div>
                    </div>	
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c3.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Annie Stephens</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a> 
                            </div>
                        </div>
                    </div>	
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c4.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Maria Luna</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a> 
                            </div>
                        </div>
                    </div>	
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c5.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Ina Hayes</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a> 
                            </div>
                        </div>
                    </div>	                                             				
                </div>
                  -->
               <!-- <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form>
                        <div class="form-group form-inline">
                          <div class="form-group col-lg-6 col-md-6 name">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 email">
                            <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                          </div>										
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <a href="#" class="button submit_btn">Post Comment</a>	
                    </form>
                </div> -->
        </div>

        <!-- Start Blog Post Siddebar -->
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
            </div>-->

            <!--<div class="single-sidebar-widget newsletter-widget">
              <h4 class="single-sidebar-widget__title">Haber Bülteni</h4>
              <div class="form-group mt-30">
                <div class="col-autos">
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email Adresinizi Giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Adresinizi Giriniz'">
                </div>
              </div>
              <button class="bbtns d-block mt-20 w-100">Üye ol</button>
            </div>  -->
          </div>
        </div>
           
            </div>
          </div>
        <!-- End Blog Post Siddebar -->
        @endforeach
      </div>
  </section>
<!--
<div class="article">
<div class="w3-row">
<div class="w3-col l3">
<div class=" w3-margin">
  <hr>
        <div class="w3-container w3-padding">
           <b>Kategorinin Yazıları</b>
           <hr>
        </div>
        <ul class="w3-ul w3-hoverable">
            @foreach($categoryArticles as $posts)
              @foreach($posts->articles as $post )
            <a href="{{ url('article', ['id' => $post->slug]) }}" class="sidebar-slug">
                <li class="w3-padding-12 w3-hover-text-white">
                    <span>{{ $post->content_title }}</span>
                </li>
            </a>
              @endforeach
            @endforeach
        </ul>
    </div>
</div>
<div class="w3-col l9 s12">
  <!-- Blog entry 
  @foreach ($articles as $key=>$article)
  <div class="w3-margin">
    <div class="w3-container"><br>
      <h1><div class="article-title">{{$article->content_title}}</div></h1>
      <h2><div class="article-description">{{$article->content_description}}, <div class="article-date">{{$article->created_at}}</div></div><h2>
      <div class="article-writer"><a class="article-writer-link" href="/writerprofile/{{$article->users->id}}">{{$article->users->name}}</a></div>
    </div>
    <br>
    <div class="w3-container">
    <div class="article-content">{!!$article->content!!}</div>
    </div>
    <hr>
    @if(count($comments)>0)
    <div class="w3-container"><br>
    <div class="article-comment">  Yazıya ait yorumlar aşağıda listelenmiştir. </div>
    </div><hr>

    @foreach($comments as $comment)
    <div class="w3-container">
    <div class="comment-writer">
      <a class="article-writer-link"  href="/writerprofile/{{$article->users->id}}">{{$comment->users->name}}  </a>
          @if(isset(auth()->user()->id) && auth()->user()->id == $comment->user_id)
          <div class="deleteComment" value="{{ $comment->id }}">-</div> 
          @endif
    </div>  
    <div class="comment-comment">{{$comment->comment}}</div>
    </div>
    <hr>
    @endforeach
    @endif

    @auth
    <div class="form-group">
    <form action="{{url('/comment/create')}}" method="get">
    <textarea class="form-control"  name="articlecomment" rows="3" placeholder="Tartışmaya katıl ve bir yorum bırak!" required></textarea>
    <input type="hidden" class="form-control" name="articleid" value="{{$article->id}}"><br>
    <input type="hidden" class="form-control" name="slug" value="{{$article->slug}}"><br>
    <div class="row">
    <div class="col-md-8">
    </div>
    <div class="col-md-4">
    <button class="form-control" type="submit" >Yorum Gönder</button>
    <br><br>
    </div>
    </div>
  
    </form>
    </div>
    @endauth
  </div>
  @endforeach
  <br><br>
 
<!-- END BLOG ENTRIES 
</div>
<!-- END w3-content 
</div>
</div>
-->
@endsection
