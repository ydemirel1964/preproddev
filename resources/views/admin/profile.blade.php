
@extends('admin.layouts.admin')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b> PP Admin</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-right">
          <h3>{{$commentCount}}</h3>
        </div>
        <h4>Yorumlar</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-right">
          <h3>{{$articleCount}}</h3>
        </div>
        <h4>Yazılar</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-right">
          <h3>{{$userCount}}</h3>
        </div>
        <h4>Kullanıcılar</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-right">
          <h3>{{$categoryCount}}</h3>
        </div>
        <h4>Kategoriler</h4>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Son Kullanıcılar</h5>
    <ul class="w3-ul w3-card-4 w3-white">
        @foreach($users as $user)
      <li class="w3-padding-16">
        <span class="w3-medium">
            {{$user->name}} - {{$user->email}} - {{$user->created_at}}</span><br>
      </li>
      @endforeach
    </ul>
  </div>
  <hr><hr>

  <div class="w3-container">
    <h5>Son Yorumlar</h5>
    <div class="w3-row">
        @foreach($comments as $comment)
      <div class="w3-col m10 w3-container">
        <h4>{{ $comment->users->name}} <span class="w3-opacity w3-medium">{{ $comment->created_at }} </span></h4>
        <p style='word-wrap: break-word; '> {{$comment->comment}}</p><br>
      </div>
      @endforeach
    </div>
  </div>
  <hr><hr>
  <div class="w3-container">
    <h5>Son Yazılar</h5>
    <div class="w3-row">
        @foreach($articles as $article)
      <div class="w3-col m10 w3-container">
        <h4>{{ $article->users->name}} <span class="w3-opacity w3-medium">{{ $article->created_at }} </span></h4>
        <p style='word-wrap: break-word; '> {{$article->content_title}}</p>
        <p style='word-wrap: break-word; '> {{$article->content_description}}</p><br>
      </div>
      @endforeach
    </div>
  </div>
  <hr>
  <hr>
  <br>
  <!-- End page content -->
@endsection
   
