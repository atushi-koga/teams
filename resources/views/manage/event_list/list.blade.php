@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="/css/top.css">
  <link rel="stylesheet" href="/css/created_event.css">
@endpush
@section('content')
  <div class="container">
    @include('manage.event_list.list_field')
  </div>
@endsection
{{--@push('script')--}}
  {{--<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>--}}
  {{--<script src="/js/cancel.js"></script>--}}
{{--@endpush--}}
