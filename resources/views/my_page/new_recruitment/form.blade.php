@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('recruitment.register_recruitment') }}</div>
          <div class="card-body">
            @include('my_page.new_recruitment.field')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
