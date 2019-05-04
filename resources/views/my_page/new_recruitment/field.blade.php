<form method="post" action="{{ route('new-recruitment.create') }}">
  @csrf
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="title">{{ __('recruitment.title') }}</label>
    <div class="col-md-6">
      <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror"
             value="{{ old('title') }}" required>
      @error('title')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="image_path">{{ __('recruitment.image_path') }}</label>
    <div class="col-md-6">
      @error('image_path')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="title">{{ __('recruitment.mount') }}</label>
    <div class="col-md-6">
      <input id="mount" type="text" name="mount" class="form-control @error('mount') is-invalid @enderror"
             value="{{ old('mount') }}" required>
      @error('mount')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="prefecture">{{ __('recruitment.prefecture') }}</label>
    <div class="col-md-6">
      <select id="prefecture" name="prefecture" class="form-control @error('prefecture') is-invalid @enderror" required>
        <option value="">選択してください</option>
        @foreach($response->prefectures as $key => $val)
          <option value="{{ $key }}" @if(old('prefecture') == $key) selected @endif>{{ $val }}</option>
        @endforeach
      </select>
      @error('prefecture')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="schedule">{{ __('recruitment.schedule') }}</label>
    <div class="col-md-6">
      <textarea id="schedule" name="schedule" class="form-control @error('schedule') is-invalid @enderror" placeholder="{{ __('recruitment.schedule.placeholder') }}">
        {{ old('schedule') }}
      </textarea>
      @error('schedule')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="date">{{ __('recruitment.date') }}</label>
    <div class="col-md-6">
      <input id="date" type="text" name="date" class="form-control @error('date') is-invalid @enderror"
             value="{{ old('date') }}" required>
      @error('date')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="capacity">{{ __('recruitment.capacity') }}</label>
    <div class="col-md-6">
      <input id="capacity" type="text" name="capacity" class="form-control @error('capacity') is-invalid @enderror"
             value="{{ old('capacity') }}" required>
      @error('capacity')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="deadline">{{ __('recruitment.deadline') }}</label>
    <div class="col-md-6">
      <input id="deadline" type="text" name="deadline" class="form-control @error('deadline') is-invalid @enderror"
             value="{{ old('deadline') }}" required>
      @error('deadline')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="requirement">{{ __('recruitment.requirement') }}</label>
    <div class="col-md-6">
      <textarea id="requirement" name="requirement" class="form-control @error('requirement') is-invalid @enderror">
        {{ old('requirement') }}
      </textarea>
      @error('requirement')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="gender_limit">{{ __('recruitment.gender_limit') }}</label>
    <div class="col-md-6">
      <select id="gender_limit" name="gender_limit" class="form-control @error('gender_limit') is-invalid @enderror" required>
        <option value="">選択してください</option>
        @foreach($response->genders as $key => $val)
          <option value="{{ $key }}" @if(old('gender_limit') == $key) selected @endif>{{ $val }}</option>
        @endforeach
      </select>
      @error('gender_limit')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="upper_age">{{ __('recruitment.upper_age') }}</label>
    <div class="col-md-6">
      @error('upper_age')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
  </div>
</form>
