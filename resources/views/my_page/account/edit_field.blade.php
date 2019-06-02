<form method="post" action="{{ route('account.edit') }}" autocomplete="off">
  @csrf
  <div class="form-group row">
    <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('register_user.nickname') }}</label>
    <div class="col-md-6">
      <input id="nickname" type="text" class="form-control @if($errors->has('nickname')) invalid @endif" name="nickname" value="{{ old('nickname', $res->getNickname()) }}" autofocus>

      @error('nickname')
    </div>
  </div>
  <div class="form-group row">
    <label for="prefecture" class="col-md-4 col-form-label text-md-right">{{ __('register_user.residence') }}</label>
    <div class="col-md-6">
      <select id="prefecture" class="select @if($errors->has('prefecture')) invalid @endif" name="prefecture">
        <option value="">----</option>
        @foreach($res->getPrefectureList() as $key => $value)
          <option value="{{ $key }}" @if(old('prefecture', $res->getPrefectureKey()) == $key) selected @endif>{{ $value }}</option>
        @endforeach
      </select>

      @error('prefecture')
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('register_user.email') }}</label>
    <div class="col-md-6">
      <input id="email" type="email" class="form-control @if($errors->has('email')) invalid @endif" name="email" value="{{ old('email', $res->getEmail()) }}">

      @error('email')
    </div>
  </div>

  <div class="form-group row">
    <div class="col-md-6 offset-md-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="change_pass" name="change_pass" value="1" {{ old('change_pass') ? 'checked' : '' }}>
        <label class="form-check-label" for="change_pass"> パスワードを変更する </label>
      </div>
    </div>
  </div>

  <div id="pass" class="form-group row {{ old('change_pass') ? '' : 'd-none' }}">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('register_user.password') }}</label>
    <div class="col-md-6">
      <input id="password" type="password" class="form-control @if($errors->has('password')) invalid @endif" name="password" {{ old('change_pass') ? '' : 'disabled' }}>

      @error('password')
    </div>
  </div>
  <div id="pass-conf" class="form-group row {{ old('change_pass') ? '' : 'd-none' }}">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('register_user.password_confirmation') }}</label>
    <div class="col-md-6">
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" {{ old('change_pass') ? '' : 'disabled' }}>
    </div>
  </div>
  <div class="ac mt20">
    <button type="submit" class="btn green">
      編集
    </button>
  </div>
</form>
