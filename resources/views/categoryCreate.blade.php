@extends('layouts.app')
@section('head')
<meta name="description"
    content="Preprod-Dev programlama ve web teknolojileri öncelik olmak üzere farklı konularda yazılar içermektedir." />
<meta name="keywords" content="preprod dev,preprod,dev,web tasarım, yazılım, software, yazılım geliştirme">
<title>Profil - Preprod Dev</title>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection
@section('content')
<div class="container profile_page_body">
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{url('/admin/category/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="category_info">
                    Eklediğiniz kategoriler onaylandıktan sonra sizin haricinizdeki kullanıcılar tarafından da
                    gözükecektir.
                </div>
                <div class="card shadow mb-4">
                    <div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kategori Adı **</label>
                                <input class="form-control" name="category">
                            </div>
                            <div class="form-group">
                                <label>Üst Kategori (Ekleyeceğiniz kategori bir alt kategoriyse buradan hangi
                                    kategorinin altında oldugunu işaretleyin)</label>
                                <select name="parentCategory" class="form-control">
                                    <option value="0"></option>
                                    @if(count($categories)>0)
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Açıklama</label>
                                <input class="form-control" name="description">
                            </div>
                            <button type="submit" class="btn btn-primary">Kayıt Et</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</div>

@endsection