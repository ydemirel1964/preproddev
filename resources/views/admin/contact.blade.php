
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
    <ul class="w3-ul w3-card-4 w3-white">
        @foreach($contacts as $contact)
      <li class="w3-padding-16">
        <span class="w3-medium">
            {{$contact->fullName}} - {{$contact->email}} - {{$contact->created_at}}</span><br>
      </li>
      @endforeach
    </ul>
  </div>
  <!-- End page content -->
@endsection
   
