@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')
<br>
<div class="w3-row" style="margin:10px;max-width:1500px;">
<form action="{{url('/admin/category/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            YENİ KATEGORİ EKLEME
            <div class="card shadow mb-4">
                <div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input class="form-control" name="category">
                        </div>  
                        <div class="form-group">
                            <label>Kategori Slug</label>
                            <input class="form-control" name="categoryslug">
                        </div> 
                        <div class="form-group">
                            <label>Metatags</label>
                            <input class="form-control" name="metatags">
                        </div> 
                        
                        <div class="form-group">
                           <label>Üst Kategori</label> 
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
@endsection