@extends('layouts.app')
@section('head')
@if(isset($articles[0]->content_description))
<meta name="description" content="{{$articles[0]->content_description}}}}" />
<title>{{ $articles[0]->content_title}} - Preprod Dev</title>
@if($articles[0]->metatags !== null)
<meta name="keywords" content='{{ $articles[0]->metatags}}'>
@endif
@endif
<script src="{{ URL::asset('js/article.js') }}"></script>
@endsection
@section('content')
<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
  @if(isset($articles[0]))
  <p style="display: none;">{{ $articles[0]->content_title}} - Preprod Dev</p>
  @endif
  <div class="container">
    @if (count($articles)>0)
    @foreach ($articles as $key=>$article)
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          @if($article->admin_confirmation == 0)
          <div class="confirmation_info">
            İlgili yazı admin tarafından onaylanmadığı için henüz sayfaya eklenmemiştir. Onaylanması durumunda ilgili
            yazı anasayfa ve kategorilerde gözükecektir.
          </div>
          @endif
          <div class="card-header text-center">
            <div class="text-left">
              <div class="user-info-area">{{ $article->users->name }}
                <p>{{ $article->created_at }}</p>
              </div>
            </div>
            <a href="{!! $article->slug !!}">
              <h1> {{$article->content_title}}</h1>
            </a>
            <p class="content-description"> {!! $article->content_description !!}</p>
          </div>
          <div class="card-body">
            <p class="card-text article-content"> {!! $article->content !!}</p>
          </div>
          <div class="commentSection">
            <textarea class="form-control" id="comment" maxlength="255" name="article-comment" rows="3"></textarea>
            <button onclick="sendComment()" class="btn" id="article-comment-button"
              style="float: right; margin-top: 20px;" type="button">
              Yorum Yaz
            </button>
            <br><br>
            <p id="article_id" style="display: none;">{{$articles[0]->id}}</p>
            <p id="slug" style="display: none;">{{$article->slug}}</p>
            <p style="color: red;" id="comment_response"></p>

            <div id="comments">
              @foreach($comments as $comment)
              <div class="card comment-card p-3" id="{{ $comment->commentId }}">
                <div class="justify-content-between align-items-center">
                  <div class="user align-items-center">
                    <span>
                      <small class="font-weight-bold text-primary">{{$comment->name}}</small> --
                      <small style="text-align: right; ">{{ $comment->created_at }}</small><br>
                      <small class="font-weight-bold">{{ $comment->comment }}</small>
                    </span>
                  </div>

                </div>
                <div style="text-align: right;">
                  @if(isset(auth()->user()->id) && $comment->userId == auth()->user()->id )
                  <small onclick="deleteComment({{ $comment->commentId }})">Yorumu Sil</small>
                  @endif
                </div>
              </div>
              @endforeach
            </div>
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