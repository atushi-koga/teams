@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">アカウント情報編集</div>
          <div class="card-body">
            編集を完了しました。
          </div>
          <div class="ac mb15">
            <a href="{{ route('account.detail') }}" type="button" class="btn green">
              会員情報へ
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
