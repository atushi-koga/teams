<div class="content-box">
  <div class="content-header">
  プロフィール
  </div>
  <div class="content-body">
    <div class="user border-bottom-0">
      <div class="user-info">
        <div class="user-image-box">
          <img src="/default_icon.jpeg" class="user-image">
        </div>
        <div>
          <div class="font18">{{ $res->getNickname() }}</div>
          <div class="font16">
            {{ $res->getGenderValue() }} {{ $res->getUserAge() }}歳
          </div>
        </div>
      </div>
    </div>
    {{--ユーザ登録時に入れた自己紹介を表示--}}
    {{--<div class="mt10">--}}
      {{--自己紹介メッセージ--}}
    {{--</div>--}}
  </div>
</div>
