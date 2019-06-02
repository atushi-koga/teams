@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('auth.login') }}</div>
          <div class="card-body">
            @if($errors->has('email'))
              <div class="ac error mb20">
                {{ $errors->first('email') }}
              </div>
            @endif
            <form method="post" action="{{ route('login') }}">
              @csrf
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @if($errors->has('email')) invalid @endif" name="email" value="{{ old('email') }}" required autocomplete="on" autofocus>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @if($errors->has('email')) invalid @endif" name="password" required autocomplete="on">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('auth.remember_me') }}
                    </label>
                  </div>
                </div>
              </div>
              <div class="ac mt10">
                <button type="submit" class="btn btn-primary">
                  {{ __('auth.login') }}
                </button>
              </div>
              {{--<div class="form-group row mb-0">--}}
                {{--<div class="col-md-8 offset-md-4">--}}
                  {{--<button type="submit" class="btn btn-primary">--}}
                    {{--{{ __('auth.login') }}--}}
                  {{--</button>--}}
                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                      {{--{{ __('Forgot Your Password?') }}--}}
                    {{--</a>--}}
                {{--</div>--}}
              {{--</div>--}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
