<div class="content-box">
  {{--<div class="list-title">--}}
  {{--プロフィール--}}
  {{--</div>--}}
  <div class="mb20">
    <div>
      <div>
        <a href="{{ route('my-page.top') }}">TOP</a>&nbsp;&gt;&nbsp;<span>プロフィールページ</span>
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
          <div class="font24">{{ $res->getNickname() }}</div>
          <div class="font16">{{ $res->getGenderValue() }}</div>
          <div class="font16">{{ $res->getUserAge() }}歳</div>
        </div>
      </div>
      <div class="mt20">
        はじめまして。田中と申します。
        宜しくお願いします。
      </div>
    </div>
  </div>
  <div class="recruitment-list">
    <div class="recruitment-date">
      <div class="year">2019</div>
      <div class="day">5/13</div>
      <div class="time">13:00～21:00</div>
    </div>
    <div class="recruitment">
      <div class="recruitment-owner">
        <div>
          <a href="" class="link"> <img class="owner-icon" src="/IMG_0838.PNG" alt="">
            <span class="owner-nickname">田中太郎 さん</span> </a>
        </div>
      </div>
      <div class="recruitment-info">
        <div class="recruitment-image-box">
          <a href="" target="_blank" class="link"><img class="recruitment-image" src="/test_img.png"></a>
        </div>
        <div class="recruitment-outline">
          <div class="area">
            <span class="label-area">神奈川県</span>
          </div>
          <div class="recruitment-title">
            <a href="" target="_blank" class="link">丹沢に上ろう</a>
          </div>
          <div class="mount">丹沢大山</div>
        </div>
        <div class="recruitment-capacity">
          <div class="font20">0人</div>
          <div>／定員10人</div>
        </div>
      </div>
    </div>
  </div>
</div>
