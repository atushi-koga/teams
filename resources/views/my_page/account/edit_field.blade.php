<form method="POST" action="{{ route('account.edit') }}" autocomplete="off">
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
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('register_user.password') }}</label>
    <div class="col-md-6">
      <input id="password" type="password" class="form-control @if($errors->has('password')) invalid @endif" name="password">

      @error('password')
    </div>
  </div>
  <div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('register_user.password_confirmation') }}</label>
    <div class="col-md-6">
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
    </div>
  </div>
  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn green">
        編集
      </button>
    </div>
  </div>
</form>
