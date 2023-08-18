@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')

<div>
  <a style="color: black;text-decoration:none;" href="{{url('admin/categorycreate')}}">
    <p>
      <button style="margin:10px;" class="btn btn-secondary">
        YENİ KATEGORİ EKLEME »
      </button>
    </p>
  </a>
  <table>
    <thead>
      <tr>
        <th>Kategori</th>
        <th>##</th>
      </tr>
    </thead>
    @foreach ($categories as $key=>$category)
    <tr>
      <td>{{$category->category}}</td>
      <td>
        <a href="{{ url('admin/category/update', ['id' => $category->id]) }}" style="text-decoration:none;">
          <button class="form-control">GUNCELLE</button></a>
        <a href="{{ url('admin/category/delete/'.$category->id) }}" style="text-decoration:none;">
          <button class="form-control" style="margin-top:5px;">SİL</button>
          </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
<div class="">
  {{ $categories->links() }}<br>
</div>
<!-- END w3-content -->
</div>
@endsection