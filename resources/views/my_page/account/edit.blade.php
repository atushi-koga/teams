@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">アカウント情報編集</div>
          <div class="card-body">
            @include('my_page.account.edit_field')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
  <script src="/js/edit_account.js"></script>
@endpush
