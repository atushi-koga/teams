@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="/css/base.css">
@endpush
@section('content')
  <div class="container">
    <div>
      <h4 class="title">{{ __('recruitment.register_recruitment') }}</h4>
    </div>
    <div>
      @include('my_page.new_recruitment.field')
    </div>
  </div>
@endsection
