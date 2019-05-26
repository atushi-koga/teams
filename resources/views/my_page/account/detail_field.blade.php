<div class="content-box">
  <div class="list-title">
    アカウント情報
  </div>
  <div class="mb20">
    <div>
      <div>
        <a href="{{ route('my-page.top') }}">TOP</a>&nbsp;&gt;&nbsp;<span>アカウント情報</span>
      </div>
    </div>
  </div>
  <div class="list-box">
    <div style="margin-bottom: 40px; max-width: 600px; margin-left:auto; margin-right:auto;">
      <div style="display: flex; display: -webkit-flex; flex-direction: row; align-items: flex-start; justify-content: flex-start;">
        <div style="width: 120px; height: 120px; margin-right: 20px;">
          <img src="/Penguins.jpg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
        </div>
        <div>
          <div class="font18">{{ $res->getNickname() }}</div>
          <div class="font16">{{ $res->getGenderValue() }}</div>
          <div class="font16">{{ $res->getUserAge() }}歳</div>
        </div>
      </div>
      <div class="mt20">
        はじめまして。田中と申します。
        宜しくお願いします。
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
        <a href="{{ route('account.shoEditForm') }}" class="btn green">
          編集する
        </a>
      </div>
    </div>
  </div>
</div>
