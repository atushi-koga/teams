<div class="content-box">
  <div class="list-title">
    募集内容登録
  </div>
  <div class="list-box">
    <div class="">
      <span>募集するに当たって必要な情報を入力してください</span>
      <form method="post" action="{{ route('new-recruitment.create') }}">
        @csrf
        <table class="input-table mt30">
          <tbody>
          <tr>
            <th><span class="required">必須</span>タイトル</th>
            <td>
              <input type="text" name="title" class="form-control @if($errors->has('title')) invalid @endif" value="{{ old('title') }}" required>

              @error('title')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>山の名称など</th>
            <td>
              <input id="mount" type="text" name="mount" class="form-control @if($errors->has('mount')) invalid @endif"
                     value="{{ old('mount') }}" required> @error('mount')
            </td>
          </tr>
          <tr>
            <th>画像</th>
            <td>
              @error('image_path')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>エリア</th>
            <td>
              <select id="prefecture" name="prefecture" class="select @if($errors->has('prefecture')) invalid @endif" required>
                <option value="">----</option>
                @foreach($response->prefectures as $key => $val)
                  <option value="{{ $key }}" @if(old('prefecture') == $key) selected @endif>{{ $val }}</option>
                @endforeach
              </select> @error('prefecture')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>行動予定</th>
            <td>
              <textarea id="schedule" name="schedule" class="form-control @if($errors->has('schedule')) invalid @endif" placeholder="{{ __('recruitment.schedule.placeholder') }}" required>
                {{ old('schedule') }}
              </textarea>

              @error('schedule')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>活動日程</th>
            <td>
              <input id="date" type="text" name="date" class="form-control @if($errors->has('date')) invalid @endif"
                     value="{{ old('date') }}" required> @error('date')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>定員</th>
            <td>
              <input id="capacity" type="text" name="capacity" class="form-control @if($errors->has('capacity')) invalid @endif" value="{{ old('capacity') }}" required> @error('capacity')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>募集締切</th>
            <td>
              <input id="deadline" type="text" name="deadline" class="form-control @if($errors->has('deadline')) invalid @endif"
                     value="{{ old('deadline') }}" required> @error('deadline')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>対象者</th>
            <td>
              <textarea name="requirement" class="form-control @if($errors->has('requirement')) invalid @endif" required>
                {{ old('requirement') }}
              </textarea>

              @error('requirement')
            </td>
          </tr>
          <tr>
            <th>持ち物</th>
            <td>
        <textarea name="" class="form-control @if($errors->has('')) invalid @endif">
        {{ old('') }}
      </textarea> @error('')
            </td>
          </tr>
          <tr>
            <th>ご参加にあたってのお願い</th>
            <td>
        <textarea name="" class="form-control @if($errors->has('')) invalid @endif">
        {{ old('') }}
      </textarea> @error('')
            </td>
          </tr>
          <tr>
            <th rowspan="3">公開範囲</th>
            <td>
              性別：<select style="display: inline; width: 50%;" id="gender_limit" name="gender_limit" class="select @if($errors->has('gender_limit')) invalid @endif">
                <option value="">----</option>
                @foreach($response->genders as $key => $val)
                  <option value="{{ $key }}" @if(old('gender_limit') == $key) selected @endif>{{ $val }}</option>
                @endforeach
              </select>

              @error('gender_limit')
            </td>
          </tr>
          <tr>
            <td>
              @error('minimum_age')

              <input type="text" name="minimum_age" class="w-25 d-inline form-control @if($errors->has('minimum_age')) invalid @endif"
                     value="{{ old('minimum_age') }}"> 歳以上
            </td>
          </tr>
          <tr>
            <td>
              @error('upper_age')

              <input type="text" name="upper_age" class="w-25 d-inline form-control @if($errors->has('upper_age')) invalid @endif"
                     value="{{ old('upper_age') }}"> 歳以下
            </td>
          </tr>
          </tbody>
        </table>
        <div class="mt20 ac">
          <button type="submit" class="btn green">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{--<form method="post" action="{{ route('new-recruitment.create') }}">--}}
{{--@csrf--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="title">{{ __('recruitment.title') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<input id="title" type="text" name="title" class="form-control @error('title') invalid @enderror"--}}
{{--value="{{ old('title') }}" required> @error('title')--}}
{{--<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="image_path">{{ __('recruitment.image_path') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--@error('image_path') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="title">{{ __('recruitment.mount') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<input id="mount" type="text" name="mount" class="form-control @error('mount') invalid @enderror"--}}
{{--value="{{ old('mount') }}" required> @error('mount')--}}
{{--<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="prefecture">{{ __('recruitment.prefecture') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<select id="prefecture" name="prefecture" class="form-control @error('prefecture') invalid @enderror" required>--}}
{{--<option value="">選択してください</option>--}}
{{--@foreach($response->prefectures as $key => $val)--}}
{{--<option value="{{ $key }}" @if(old('prefecture') == $key) selected @endif>{{ $val }}</option>--}}
{{--@endforeach--}}
{{--</select> @error('prefecture') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="schedule">{{ __('recruitment.schedule') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<textarea id="schedule" name="schedule" class="form-control @error('schedule') invalid @enderror" placeholder="{{ __('recruitment.schedule.placeholder') }}">--}}
{{--{{ old('schedule') }}--}}
{{--</textarea> @error('schedule') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="date">{{ __('recruitment.date') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<input id="date" type="text" name="date" class="form-control @error('date') invalid @enderror"--}}
{{--value="{{ old('date') }}" required> @error('date')--}}
{{--<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="capacity">{{ __('recruitment.capacity') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<input id="capacity" type="text" name="capacity" class="form-control @error('capacity') invalid @enderror"--}}
{{--value="{{ old('capacity') }}" required> @error('capacity')--}}
{{--<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="deadline">{{ __('recruitment.deadline') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<input id="deadline" type="text" name="deadline" class="form-control @error('deadline') invalid @enderror"--}}
{{--value="{{ old('deadline') }}" required> @error('deadline')--}}
{{--<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="requirement">{{ __('recruitment.requirement') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<textarea id="requirement" name="requirement" class="form-control @error('requirement') invalid @enderror">--}}
{{--{{ old('requirement') }}--}}
{{--</textarea> @error('requirement') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="gender_limit">{{ __('recruitment.gender_limit') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--<select id="gender_limit" name="gender_limit" class="form-control @error('gender_limit') invalid @enderror">--}}
{{--<option value="">選択してください</option>--}}
{{--@foreach($response->genders as $key => $val)--}}
{{--<option value="{{ $key }}" @if(old('gender_limit') == $key) selected @endif>{{ $val }}</option>--}}
{{--@endforeach--}}
{{--</select> @error('gender_limit') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group row">--}}
{{--<label class="col-md-4 col-form-label text-md-right" for="upper_age">{{ __('recruitment.upper_age') }}</label>--}}
{{--<div class="col-md-6">--}}
{{--@error('upper_age') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row mb-0">--}}
{{--<div class="col-md-6 offset-md-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--{{ __('recruitment.register') }}--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
