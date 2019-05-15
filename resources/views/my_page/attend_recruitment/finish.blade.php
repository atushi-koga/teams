@extends('layouts.app')
@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/detail_recruitment.css">
@endpush
@section('content')
  <div class="container">
    参加申込が完了しました。
    マイページトップから参加情報を確認できます。
  </div>
@endsection
