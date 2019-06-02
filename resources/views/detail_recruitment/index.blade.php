@extends('layouts.app')
@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/detail_recruitment.css">
@endpush
@section('content')
  <div class="container">
    @include('detail_recruitment.field')
  </div>
@endsection
@push('script')
  <script src="/js/cancel.js"></script>
@endpush
