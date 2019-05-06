@extends('layouts.app')
@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">募集内容</div>
          <div class="card-body">
            @include('my_page.detail_recruitment.field')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="/js/join.js"></script>
@endpush
