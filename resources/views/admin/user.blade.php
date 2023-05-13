@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')

<div class="w3-row" style="margin:0px 10px 10px 10px;">
<br>
<table class="w3-table-all" >
    <thead>
      <tr class="w3">
        <th>Kullanıcı Adı</th>
        <th>Email</th>
        <th>Oluşturulma Tarihi</th>
        <th>Tipi</th>
        <th>Aktiflik Durumu</th>
        <th>#</th>
      </tr>
    </thead>

  <!-- Blog entry -->
  @foreach ($users as $key=>$user)
  <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at}}</td>
      <td>{{$user->type}}</td>
      <td>{{$user->active_status}}</td>
      <td>
        <a href="{{ url('admin/user/update', ['id' => $user->id]) }}" style="text-decoration:none;">
        <button class="form-control">GUNCELLE</button></a>
        <a href="{{ url('admin/user/delete/'.$user->id) }}" style="text-decoration:none;">
        <button class="form-control" style="margin-top:5px;">SİL</button>
        </form>
      </td>
    </tr>
  @endforeach
  </table>
<!-- END BLOG ENTRIES -->

</div>  
<div class="w3-center">
{{ $users->links() }}<br>
</div>
<!-- END w3-content -->
</div>
@endsection
