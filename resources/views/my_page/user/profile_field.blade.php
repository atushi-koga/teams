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
    <div class="mt15">
      <div>自己紹介</div>
      <div class="introduction">{!! nl2br(e($res->getIntroduction())) !!}</div>
    </div>
  </div>
</div>
