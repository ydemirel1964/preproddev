@extends('layouts.app')
@section('head')
@if(isset($articles[0]->content_description))
<meta name="description" content="{{$articles[0]->content_description}}}}"/>
<title>{{ $articles[0]->content_title}} - Preprod Dev</title>
<meta name="keywords" content='{{ $articles[0]->metatags}}'>
@endif
<script type="text/javascript" src="{{ URL::asset('js/article.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/article.css') }}">
@endsection
@section('content')
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
  <!-- Blog entry -->
  @foreach ($articles as $key=>$article)
  <div class="w3-margin">
    <div class="w3-container"><br>
      <h1><div class="article-title">{{$article->content_title}}</div></h1>
      <h2><div class="article-description">{{$article->content_description}}, <div class="article-date">{{$article->created_at}}</div></div><h2>
      <div class="article-writer">Yazar : <a class="article-writer-link" href="/writerprofile/{{$article->users->id}}"> {{$article->users->name}} </a></div>
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
    <div class="comment-writer">Yazar : <a class="article-writer-link"  href="/writerprofile/{{$article->users->id}}">{{$comment->users->name}} </a></div>
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
 
<!-- END BLOG ENTRIES -->
</div>
<!-- END w3-content -->
</div>
</div>
@endsection
