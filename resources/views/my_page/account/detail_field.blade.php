<div class="content-box">
  <div class="content-header">
    アカウント情報
  </div>
  <div class="content-body">
    <div style="margin-bottom: 40px; max-width: 600px; margin-left:auto; margin-right:auto;">
      <div style="display: flex; display: -webkit-flex; flex-direction: row; align-items: flex-start; justify-content: flex-start;">
        <div style="width: 120px; height: 120px; margin-right: 20px;">
          <img src="/default_icon.jpeg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
        </div>
        <div>
          <div class="font18">{{ $res->getNickname() }}</div>
          <div class="font16">居住地: <span>{{ $res->getPrefectureValue() }}</span></div>
          <div class="font16">
            <span>{{ $res->getGenderValue() }} {{ $res->getUserAge() }}歳</span>
          </div>
          <div class="font16">{{ $res->getEmail() }}</div>
        </div>
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
        <a href="{{ route('account.shoEditForm') }}" class="btn green"> 編集する </a>
        <a href="{{ route('account.logout') }}" class="btn default"> ログアウト </a>
      </div>
    </div>
  </div>
</div>
