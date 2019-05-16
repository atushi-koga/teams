@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">登録完了</div>
                    <div class="card-body">
                        アカウント登録が完了しました。
                        <a href="{{ route('my-page.top') }}">マイページトップへ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
