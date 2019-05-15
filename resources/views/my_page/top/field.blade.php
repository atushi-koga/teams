<div class="recruitment-list">
  <div class="recruitment-date">
    <div class="year">2019</div>
    <div class="day">5/13(月)</div>
    <div class="time">13:00～21:00</div>
  </div>
  <div class="recruitment">
    <div class="recruitment-owner">
      <div>
        <a href="" class="link"> <img class="owner-icon" src="/IMG_0838.PNG" alt=""> <span class="owner-nickname">田中 太郎 さん</span></a>
      </div>
    </div>
    <div class="recruitment-info">
      <div class="recruitment-image-box">
        <a href="" target="_blank" class="link"><img class="recruitment-image" src="/test_img.png"></a>
      </div>
      <div class="recruitment-outline">
        <div class="area">
          <span class="label-area">関東</span>
        </div>
        <div class="recruitment-title">
          <a href="" class="link">武蔵小杉もくもく会</a>
        </div>
        <div class="mount">高尾山</div>
      </div>
      <div class="recruitment-capacity">
        <div class="count">0人</div>
        <div class="max">定員10人</div>
      </div>
    </div>
  </div>
</div>
<div class="recruitment-list">

</div>


@foreach($response->recruitment as $recruitment)
  <div>
    <p><a href="{{ route('detail-recruitment.detail', ['id' => $recruitment->getId()]) }}">{{ $recruitment->getTitle() }}</a></p>
    <p>{{ $recruitment->getMount() }}</p>
    <p>{{ $recruitment->getPrefectureKey() }}</p>
    <p>{{ $recruitment->getPrefectureValue() }}</p>
  </div>
@endforeach
