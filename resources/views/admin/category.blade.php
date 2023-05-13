@extends('admin.layouts.admin')
@section('js')

@endsection
@section('css')

@endsection
@section('content')

<div class="w3-row" style="margin:10px;">
  <a style="color: black;text-decoration:none;" href="{{url('admin/categorycreate')}}">
    <p>
      <button style="margin:10px;" class="w3-button w3-padding-large w3-white w3-border w3-right">
      <b>
        YENİ KATEGORİ EKLEME »
      </b>
      </button>
    </p>
  </a>
  <table class="w3-table-all">
    <thead>
      <tr class="w3">
        <th>Kategori</th>
        <th>##</th>
      </tr>
    </thead>

    <!-- Blog entry -->
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
  <!-- END BLOG ENTRIES -->

</div>
<div class="w3-center">
  {{ $categories->links() }}<br>
</div>
<!-- END w3-content -->
</div>
@endsection