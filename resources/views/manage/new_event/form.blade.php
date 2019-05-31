@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="/css/top.css">
@endpush
@section('content')
  <div class="container">
    @include('manage.new_event.field')
  </div>
@endsection
