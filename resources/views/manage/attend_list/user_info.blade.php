<div class="content-box">
  <div class="content-header">
    参加者一覧
  </div>
  <div class="mb20">
    <div>
      <div>
        <a href="{{ route('top') }}">TOP</a>&nbsp;&gt;&nbsp;<span>参加者一覧</span>
      </div>
    </div>
  </div>
  <div class="content-body">
    @foreach($res as $r)
      <div style="margin-bottom: 40px; max-width: 600px; margin-left:auto; margin-right:auto;">
        <div style="display: flex; display: -webkit-flex; flex-direction: row; align-items: flex-start; justify-content: flex-start;">
          <div style="width: 120px; height: 120px; margin-right: 20px;">
            <img src="/default_icon.jpeg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
          </div>
          <div>
            <div class="font18"><a href="{{ route('user.profile', ['id' => $r->getUserId()]) }}">{{ $r->getNickname() }}</a></div>
            <div class="font16">{{ $r->getGenderValue() }}</div>
            <div class="font16">{{ $r->getUserAge() }}歳</div>
          </div>
        </div>
      </div>
    @endforeach
      {{--<div style="margin-bottom: 40px; max-width: 600px; margin-left:auto; margin-right:auto;">--}}
        {{--<div style="display: flex; display: -webkit-flex; flex-direction: row; align-items: flex-start; justify-content: flex-start;">--}}
          {{--<div style="width: 120px; height: 120px; margin-right: 20px;">--}}
            {{--<img src="/default_icon.jpeg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">--}}
          {{--</div>--}}
          {{--<div>--}}
            {{--<div class="font18">nickname</div>--}}
            {{--<div class="font16">gender</div>--}}
            {{--<div class="font16">xx歳</div>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--<div class="form-group row mb-0">--}}
      {{--<div class="col-md-6 offset-md-4">--}}
        {{--<a href="{{ route('account.shoEditForm') }}" class="btn btn-dark"> 戻る </a>--}}
      {{--</div>--}}
    {{--</div>--}}
  </div>
</div>
