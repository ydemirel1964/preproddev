@extends('layouts.app')
@section('head')
<meta name="description"
  content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="preprod dev,preprod,dev,web tasarım, yazılım, software, yazılım geliştirme">
<title>Profil - Preprod Dev</title>
@endsection
@section('content')
<div class="profile_header_area">
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-4"><a href="/" class="btn btn-secondary btn-block"> Yazı Ekle</a></div>
      <div class="col-md-4"><a href="/" class="btn btn-secondary btn-block"> Kategori Ekle</a></div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div>
        @if(count($userarticles)>0)
        <div class="profile_info">Eklediğiniz Yazılar </div>
        @else
        <div class="profile_info">Eklediğiniz herhangi yazınız bulunmamaktadır.</div>
        @endif
      </div>
      <hr>
      <!-- Blog entry -->
      @foreach ($userarticles as $item)
      <div>
        <div class="w3-container">
          <div class="article-title"><b><a href="{{url('/'.$item->slug)}}">
                <h2>{{$item->content_title}}</h2>
              </a>
            </b></div>
          <div class="article-description">{{$item->content_description}}, <div class="article-date">
              {{$item->created_at}} </div>
          </div>
        </div>
        <div class="w3-container">
          <div class="w3-row">
            <div class="w3-col m8 s12">
              <a class="article-content-link" href="{{url('/'.$item->slug)}}"> Yazının tamamı için tıklayınız. » </a>
            </div>
            <div class="w3-col m4 w3-hide-small w3-right">
              <p><span class=" w3-right">Yorumlar {{ count($item->comments) }}</span></p>
            </div>
          </div>
        </div>
      </div>
      <hr>
      @endforeach
      <!-- END BLOG ENTRIES -->
      <div>{{ $userarticles->links() }}</div>
    </div>
    <div class="col-md-4">
      <div>
        @if(count($userarticles)>0)
        <div class="profile_info">Eklediğiniz Kategoriler </div>
        @else
        <div class="profile_info">Eklediğiniz herhangi yazınız bulunmamaktadır.</div>
        @endif
      </div>
      <hr>
      <!-- Blog entry -->
      @foreach ($userarticles as $item)
      <div>
        <div class="w3-container">
          <div class="article-title"><b><a href="{{url('/'.$item->slug)}}">
                <h2>{{$item->content_title}}</h2>
              </a>
            </b></div>
          <div class="article-description">{{$item->content_description}}, <div class="article-date">
              {{$item->created_at}} </div>
          </div>
        </div>
        <div class="w3-container">
          <div class="w3-row">
            <div class="w3-col m8 s12">
              <a class="article-content-link" href="{{url('/'.$item->slug)}}"> Yazının tamamı için tıklayınız. » </a>
            </div>
            <div class="w3-col m4 w3-hide-small w3-right">
              <p><span class=" w3-right">Yorumlar {{ count($item->comments) }}</span></p>
            </div>
          </div>
        </div>
      </div>
      <hr>
      @endforeach
      <!-- END BLOG ENTRIES -->
      <div>{{ $userarticles->links() }}</div>
    </div>
  </div>
</div>

@endsection