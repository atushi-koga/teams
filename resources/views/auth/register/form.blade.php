@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('register_user.register_form') }}</div>
                <div class="card-body">
                    @include('auth.register.field')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
