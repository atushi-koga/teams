@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="/css/top.css">
@endpush
@section('content')
  <div class="container">
    @include('manage.attend_list.user_info')
  </div>
@endsection
