@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($category as $item)
            <form action="{{url('admin/category/update/'.$item->id)}}" method="put">
            <h6 style="padding-left: 20px;padding-top:20px;"><b>{{$item->id}}</b> ID'Lİ KATEGORİ GUNCELLEME</h6>
                @csrf
                <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kategori</label>
                                <input value="{{$item->category}}" class="form-control" name="category">
                            </div>
                            <div class="form-group">
                            <label>Kategori Slug</label>
                            <input value="{{$item->slug}}"  class="form-control" name="categoryslug">
                             </div>  
                             <div class="form-group">
                            <label>Metatags</label>
                            <input value="{{$item->metatags}}" class="form-control" name="metatags">
                             </div> 
                             <div class="form-group">
                           <label>Üst Kategori</label> 
                            <select name="parentCategory" class="form-control">
                            <option value="0"></option>
                                @if(count($categories)>0)
                                    @foreach($categories as $category)
                                            @if($item->parent_id === $category->id)
                                            <option value="{{$category->id}}" selected>{{$category->category}}</option>
                                            @else
                                            <option value="{{$category->id}}">{{$category->category}}</option>
                                            @endif
                                     @endforeach
                                @endif
                            </select>
                            </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input value="{{$item->description}}" class="form-control" name="description">
                        </div> 
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                </div>
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection