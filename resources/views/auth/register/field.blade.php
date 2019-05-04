<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="form-group row">
    <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('register_user.nickname') }}</label>
    <div class="col-md-6">
      <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autofocus>
      @error('nickname')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="prefecture" class="col-md-4 col-form-label text-md-right">{{ __('register_user.residence') }}</label>
    <div class="col-md-6">
      <select id="prefecture" class="form-control @error('prefecture') is-invalid @enderror" name="prefecture" required>
        <option value="">選択してください</option>
        @foreach($response->prefectures as $key => $value)
          <option value="{{ $key }}" @if(old('prefecture') == $key) selected @endif>{{ $value }}</option>
        @endforeach
      </select>
      @error('prefecture')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('register_user.gender') }}</label>
    <div class="col-md-6">
      <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
        <option value="">選択してください</option>
        @foreach($response->genders as $key => $value)
          <option value="{{ $key }}" @if(old('gender') == $key) selected @endif>{{ $value }}</option>
        @endforeach
      </select>
      @error('gender')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">{{ __('register_user.birthday') }}</label>
    <div class="col-md-6">
      <input type="text" class="form-control @error('birth_year') is-invalid @enderror" name="birth_year" value="{{ old('birth_year') }}" required placeholder="年">
      <input type="text" class="form-control @error('birth_month') is-invalid @enderror" name="birth_month" value="{{ old('birth_month') }}" required placeholder="月">
      <input type="text" class="form-control @error('birth_day') is-invalid @enderror" name="birth_day" value="{{ old('birth_day') }}" required placeholder="日">

      @error('birthday')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('register_user.email') }}</label>
    <div class="col-md-6">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
      @error('email')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('register_user.password') }}</label>
    <div class="col-md-6">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
      @error('password')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('register_user.password_confirmation') }}</label>
    <div class="col-md-6">
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
  </div>

  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-primary">
        {{ __('register_user.register') }}
      </button>
    </div>
  </div>
</form>
