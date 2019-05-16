@extends('layouts.app')
@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/attend_conf.css">
@endpush
@section('content')
  <div class="container">
    @include('my_page.attend_recruitment.finish_field')
  </div>
@endsection
