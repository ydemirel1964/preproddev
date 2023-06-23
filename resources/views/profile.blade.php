@extends('layouts.app')
@section('head')
<meta name="description"
  content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="preprod dev,preprod,dev,web tasarım, yazılım, software, yazılım geliştirme">
<title>Profil - Preprod Dev</title>
@endsection
@section('content')

<div class="container profile_page_body">
  <div class="row">
    <div class="col-md-3 text-center">
      <div><a href="/profile/create-article" class="button btn-block profile-action-button">Yeni Yazı Ekle</a></div>
      <div><a href="/profile/create-category" class="button btn-block profile-action-button">Yeni Kategori Ekle</a>
      </div>
    </div>
    <div class="col-md-9" style="border-left:black 0.1px solid">
      <div>
        @if(count($userArticles)>0)
        @else
        <div class="profile_info">Herhangi bir yazınız bulunmamaktadır. Yeni içerikler ekleyerek bizlere katkıda
          bulunabilirsiniz.</div>
        @endif
      </div>
      @foreach ($userArticles as $article)
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <div class="text-left">
                <div class="user-info-area">
                  <p>{{ $article->created_at }}</p>
                </div>
              </div>
              <div class="profile_content_title">
                <a href="{!! $article->slug !!}">
                  <h2> {{$article->content_title}}</h2>
                </a>
              </div>
              <p class="content-description"> {!! $article->content_description !!}</p>

            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center profile-action-button">
            <a class="button btn-block" href="{{ url('/' . $article->slug) }}">YAZIYI GÖSTER</a>
          </div>
          <div class="text-center profile-action-button">
            <a class="button btn-block" href="{{ url('profile/update-article', ['id' => $article->id]) }}">GUNCELLE</a>
          </div>
          <div class="text-center profile-action-button">
            <a class="button btn-block" href="{{ url('/profile/article/delete', ['id'=>$article->id]) }}">SIL</a>
          </div>
        </div>
      </div>
      @endforeach
      <div>{{ $userArticles->links() }}</div>
    </div>
  </div>
</div>
@endsection