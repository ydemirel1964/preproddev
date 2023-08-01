@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')

<br><br>
<div class="row">
  <form action="{{url('/admin/article-search')}}" method="GET" enctype="multipart/form-data">
    <div class="row">
      <div class="col-8">
      </div>
      <div class="col-4">
        <input class="form-control" style="float:left" name="article_search"><br><br>
        <button type="submit" style="float:right;width:150px;" class="btn btn-secondary">ARA</button>
      </div>
    </div>
  </form>
  <a style="color:black;text-decoration:none;" href="{{url('admin/articlecreate')}}">
    <p>
      <button class="btn btn-primary">
        <b>YENİ YAZI EKLEME »</b>
      </button>
    </p>
  </a>
  <br>

  <table class="table table-striped table-bordered">
    <thead>
      <tr class="w3">
        <th>Başlık</th>
        <th>Açıklama</th>
        <th>Yazar</th>
        <th>##</th>
      </tr>
    </thead>

    @foreach ($articles as $key=>$article)
    <tr>
      <td>{{$article->content_title}}</td>
      <td style='word-wrap: break-word;max-width:500px;'>{{$article->content_description}}</td>
      <td>{{$article->users->name}}</td>
      <td>
        <a href="{{ url('admin/article/updateform', ['id' => $article->id]) }}" style="text-decoration:none;">
          <button class="form-control">GUNCELLE</button></a>
        <a href="{{ url('admin/article/delete/'.$article->id) }}" style="text-decoration:none;margin:">
          <button class="form-control" style="margin-top:5px;">SİL</button>
          </form>
      </td>
    </tr>
    @endforeach
  </table>

</div>
<div class="d-flex justify-content-center">
  {{ $articles->links() }}<br><br>
</div>
<!-- END w3-content -->
</div>
@endsection