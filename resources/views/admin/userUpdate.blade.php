@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($user as $item)
            <form action="{{url('admin/user/update/'.$item->id)}}" method="put">
                <h6 style="padding-left: 20px;padding-top:20px;"><b>{{$item->id}}</b> ID'Lİ KULLANICI GUNCELLEME</h6>
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input value="{{$item->name}}" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Kullanıcı Email</label>
                            <input value="{{$item->email}}" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Kullanıcı Oluşturulma Tarihi</label>
                            <input type="datetim" value="{{$item->created_at}}" class="form-control" name="created_at">
                        </div>
                        <div class="form-group">
                            <label>Tipi</label>
                            <input value="{{$item->type}}" class="form-control" name="type">
                        </div>
                        <div class="form-group">
                            <label>Aktiflik Durumu</label>
                            <input value="{{$item->active_status}}" class="form-control" name="active_status">
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