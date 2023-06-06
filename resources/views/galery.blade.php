@extends('layouts.app')

@section('css')
@endsection

@section('content')

@if(session('error'))
<div class="container">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
@if(session('success'))
<div class="container">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
<div class="container">
  <a href="galery/add"><button type="button" class="btn btn-primary" id="addDataButton">Add Data</button></a>
</div>
@php
  // Menghilangkan header HTTP dari respon
  $jsonString = substr($galery, strpos($galery, '{'));
  // Parsing data JSON menjadi array
  $data = json_decode($jsonString, true);
@endphp
<edit-fitur 
  :base-asset="'{{ asset('storage') }}'"
  :datas="{{ json_encode($data) }}"
  :csrf-token="'{{ csrf_token() }}'"
></edit-fitur>
<fitur-component
  :base-asset="'{{ asset('storage') }}'"
  :fitures="{{ json_encode($data) }}"
></fitur-component>
@endsection

@section('script')
@endsection
