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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="/js/cancel.js"></script>
@endpush
