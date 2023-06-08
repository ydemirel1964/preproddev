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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="category_info">
                Eklediğiniz yazılar onaylandıktan sonra sizin haricinizdeki kullanıcılar tarafından da
                gözükecektir.
            </div>
            <form action="{{url('/profile/create-article')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card shadow mb-4">
                    <div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Yazı Başlığı **</label>
                                <input class="form-control" name="articlecontenttitle">
                            </div>

                            <div class="form-group">
                                <label>Yazı Özeti </label>
                                <input class="form-control" name="articlecontentdescription">
                            </div>
                            <div class="form-group">
                                <label>Yazı İçeriği **</label>
                                <textarea class="form-control" id="summernote" name="articlecontent"
                                    rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                Kategori **
                                <select name="categories[]" class="form-control" multiple="multiple">
                                    @if(count($categories)>0)
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Kayıt Et</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>

        <script type="application/javascript">
            $('#summernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']]
                ],
                styleTags: ['p', 'pre']
            });
        </script>

    </div>
</div>
</div>

@endsection