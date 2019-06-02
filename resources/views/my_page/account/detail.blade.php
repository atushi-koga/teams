@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="/css/top.css">
  <link rel="stylesheet" href="/css/user.css">
@endpush
@section('content')
  <div class="container">
    @include('my_page.account.detail_field')
  </div>
@endsection
