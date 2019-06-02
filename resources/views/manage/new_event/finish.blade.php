@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="/css/top.css">
@endpush
@section('content')
  <div class="container">
    <div class="content-box">
      <div class="content-header">新規イベント登録</div>
      <div class="content-body">
        <div>
          <span>イベントを登録しました。</span>
        </div>
        <div class="ac mt15 mb15">
          <a href="{{ route('manage-event.list') }}" class="btn green">作成イベント一覧へ</a>
        </div>
      </div>
    </div>
  </div>
@endsection
