@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')
<br>
<div class="w3-row" style="margin:10px;max-width:1500px;">
<form action="{{url('/admin/article/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            YENİ YAZI EKLEME
            <div class="card shadow mb-4">
                <div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Yazı Başlığı</label>
                            <input class="form-control" name="articlecontenttitle">
                        </div>
                     
                        <div class="form-group">
                            <label>Yazı Özeti</label>
                            <input class="form-control" name="articlecontentdescription">
                        </div>
                     
                           <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" name="articleslug">
                        </div>
                        <div class="form-group">
                            <label>Metatags</label>
                            <input class="form-control" name="metatags">
                        </div>
                      
                        <div class="form-group">
                              <label>Yazı İçeriği</label>
                              <textarea class="form-control" id="summernote" name="articlecontent" rows="10"></textarea>
                        </div>
                         
                        <div class="form-group">
                            Kategori
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
                                  ['insert', ['link', 'picture']],
                                  ['view', [ 'codeview']]
                                ]
                              });
                        </script>
@endsection