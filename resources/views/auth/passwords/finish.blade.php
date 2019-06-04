@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">パスワード再設定完了</div>
          <div class="card-body">
            <div class="mb20">
              <span>{{ __('passwords.reset') }}</span>
            </div>
            <div class="ac mt15 mb15">
              <a href="{{ route('top') }}" class="btn green">トップへ</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
