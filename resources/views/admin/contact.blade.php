
@extends('admin.layouts.admin')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b> PP Admin</b></h5>
  </header>
  <hr>
  <div class="w3-container">
    <h5>Son Mesajlarınız</h5>
    <table class="w3-table-all">
      <thead>
        <tr class="w3">
          <th>İsim</th>
          <th>Email</th>
          <th>Başlık</th>
          <th>Mesaj</th>
          <th>Tarih</th>
          <th>#</th>
        </tr>
      </thead>
      @foreach($contacts as $contact)
      <tr>
        <td>{{$contact->fullName}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->title}}</td>
        <td>{{$contact->body}}</td>
        <td>{{$contact->created_at}}</td>
        <td>            
          <a href="{{ url('admin/contact/delete/'.$contact->id) }}" style="text-decoration:none;margin:">
          <button class="form-control" style="margin-top:5px;">SİL</button>
        </a></td>
      </tr>
      @endforeach
    </table>
 
  </div>
  <!-- End page content -->
@endsection
   
