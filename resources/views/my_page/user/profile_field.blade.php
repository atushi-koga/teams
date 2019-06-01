<div class="content-box">
  <div class="list-title">
  プロフィール
  </div>
  {{--<div class="mb20">--}}
    {{--<div>--}}
      {{--<div>--}}
        {{--<a href="{{ route('top') }}">TOP</a>&nbsp;&gt;&nbsp;<span>プロフィールページ</span>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
  <div class="list-box">
    <div style="margin-bottom: 40px; max-width: 600px; margin-left:auto; margin-right:auto;">
      <div style="display: flex; display: -webkit-flex; flex-direction: row; align-items: flex-start; justify-content: flex-start;">
        <div style="width: 120px; height: 120px; margin-right: 20px;">
          <img src="/default_icon.jpeg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
        </div>
        <div>
          <div class="font24">{{ $res->getNickname() }}</div>
          <div class="font16">
            <span>{{ $res->getGenderValue() }} {{ $res->getUserAge() }}歳</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
