<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="form-group row">
    <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('register_user.nickname') }}</label>
    <div class="col-md-6">
      <input id="nickname" type="text" class="form-control @if($errors->has('nickname')) invalid @endif" name="nickname" value="{{ old('nickname') }}" required autofocus> @error('nickname')
    </div>
  </div>

  <div class="form-group row">
    <label for="prefecture" class="col-md-4 col-form-label text-md-right">{{ __('register_user.residence') }}</label>
    <div class="col-md-6">
      <select id="prefecture" class="select @if($errors->has('prefecture')) invalid @endif" name="prefecture" required>
        <option value="">----</option>
        @foreach($response->prefectures as $key => $value)
          <option value="{{ $key }}" @if(old('prefecture') == $key) selected @endif>{{ $value }}</option>
        @endforeach
      </select> @error('prefecture')
    </div>
  </div>

  <div class="form-group row">
    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('register_user.gender') }}</label>
    <div class="col-md-6">
      <select id="gender" name="gender" class="select @if($errors->has('gender')) invalid @endif" required>
        <option value="">----</option>
        @foreach($response->genders as $key => $value)
          <option value="{{ $key }}" @if(old('gender') == $key) selected @endif>{{ $value }}</option>
        @endforeach
      </select> @error('gender')
    </div>
  </div>

  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">{{ __('register_user.birthday') }}</label>
    <div class="col-md-6">
      <select id="birth_year" name="birth_year" style="width: 90px" class="select @if($errors->has('birthday')) invalid @endif" required>
        <option value="">----</option>
          @foreach($response->birthYearList as $key => $value)
            <option value="{{ $key }}" @if(old('birth_year') == $key) selected @endif>{{ $value }}</option>
          @endforeach
      </select>／
      <select id="birth_month" name="birth_month" class="select @if($errors->has('birthday')) invalid @endif" style="width: 70px" required>
        <option value=""> --- </option>
        @foreach($response->birthMonthList as $key => $value)
          <option value="{{ $key }}" @if(old('birth_month') == $key) selected @endif>{{ $value }}</option>
        @endforeach
      </select>／
      <select id="birth_day" name="birth_day" class="select @if($errors->has('birthday')) invalid @endif" style="width: 70px" required>
        <option value="">----</option>
        @foreach($response->birthDayList as $key => $value)
          <option value="{{ $key }}" @if(old('birth_day') == $key) selected @endif>{{ $value }}</option>
        @endforeach
      </select>

      @error('birthday')
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('register_user.email') }}</label>
    <div class="col-md-6">
      <input id="email" type="email" class="form-control @if($errors->has('email')) invalid @endif" name="email" value="{{ old('email') }}" required> @error('email')
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('register_user.password') }}</label>
    <div class="col-md-6">
      <input id="password" type="password" class="form-control @if($errors->has('password')) invalid @endif" name="password" required> @error('password')
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
      <button type="submit" class="btn green">
        {{ __('register_user.register') }}
      </button>
    </div>
  </div>
</form>
