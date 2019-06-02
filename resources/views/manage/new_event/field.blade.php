<div class="content-box">
  <div class="content-header">新規イベント登録</div>
  <div class="content-body">
    <div>
      <span>募集するに当たって必要な情報を入力してください</span>
      <form method="post" action="{{ route('manage-event.create') }}">
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
            <th><span class="required">必須</span>山の名称</th>
            <td>
              <input id="mount" type="text" name="mount" class="form-control @if($errors->has('mount')) invalid @endif"
                     value="{{ old('mount') }}" required>

              @error('mount')
            </td>
          </tr>
          {{--<tr>--}}
            {{--<th>画像</th>--}}
            {{--<td>--}}
              {{--@error('image_path')--}}
            {{--</td>--}}
          {{--</tr>--}}
          <tr>
            <th><span class="required">必須</span>エリア</th>
            <td>
              <select id="prefecture" name="prefecture" class="select @if($errors->has('prefecture')) invalid @endif" required>
                <option value="">----</option>
                @foreach($res->prefectures as $key => $val)
                  <option value="{{ $key }}" @if(old('prefecture') == $key) selected @endif>{{ $val }}</option>
                @endforeach
              </select>

              @error('prefecture')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>行動予定</th>
            <td>
              <textarea id="schedule" rows="6" name="schedule" class="form-control @if($errors->has('schedule')) invalid @endif" placeholder="{{ __('recruitment.schedule.placeholder') }}" required>{{ old('schedule') }}</textarea>

              @error('schedule')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>活動日程</th>
            <td>
              <input id="date" type="text" name="date" class="form-control @if($errors->has('date')) invalid @endif"
                     value="{{ old('date') }}" required>

              @error('date')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>定員</th>
            <td>
              <input id="capacity" type="text" name="capacity" class="form-control @if($errors->has('capacity')) invalid @endif" value="{{ old('capacity') }}" required>

              @error('capacity')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>募集締切</th>
            <td>
              <input id="deadline" type="text" name="deadline" class="form-control @if($errors->has('deadline')) invalid @endif"
                     value="{{ old('deadline') }}" required>

              @error('deadline')
            </td>
          </tr>
          <tr>
            <th><span class="required">必須</span>対象者</th>
            <td>
              <textarea name="requirement" rows="6" class="form-control @if($errors->has('requirement')) invalid @endif" required>{{ old('requirement') }}</textarea>

              @error('requirement')
            </td>
          </tr>
          <tr>
            <th>持ち物</th>
            <td>
              <textarea name="belongings" rows="6" class="form-control @if($errors->has('')) invalid @endif">{{ old('belongings') }}</textarea>

              @error('belongings')
            </td>
          </tr>
          <tr>
            <th>ご参加にあたってのお願い</th>
            <td>
              <textarea name="notes" rows="6" class="form-control @if($errors->has('')) invalid @endif">{{ old('notes') }}</textarea>

              @error('notes')
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
