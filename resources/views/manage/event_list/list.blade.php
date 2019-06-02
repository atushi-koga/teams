@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="/css/top.css">
@endpush
@section('content')
  <div class="container">
    @include('manage.event_list.list_field')
  </div>
@endsection
@push('script')
  <script src="/js/delete_event.js"></script>
@endpush
