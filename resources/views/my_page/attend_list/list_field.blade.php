<div class="content-box">
  <div class="list-title">
    申込済みのイベント
  </div>
  <div class="list-box">
    @foreach($res as $topRec)
      <div class="recruitment-list">
        <div class="recruitment-date">
          <div class="year">{{ $topRec->getHeldYear() }}</div>
          <div class="day">{{ $topRec->getHeldDate() }}</div>
          <div class="time">13:00～21:00</div>
        </div>
        <div class="recruitment">
          <div class="recruitment-owner">
            <div>
              <a href="" class="link"> <img class="owner-icon" src="/IMG_0838.PNG" alt="">
                <span class="owner-nickname">{{ $topRec->getCreateUserNickname() }}</span> </a>
            </div>
          </div>
          <div class="recruitment-info">
            <div class="recruitment-image-box">
              <a href="{{ route('detail-recruitment', ['id' => $topRec->getRecruitmentId()]) }}" target="_blank" class="link"><img class="recruitment-image" src="/test_img.png"></a>
            </div>
            <div class="recruitment-outline">
              <div class="area">
                <span class="label-area">{{ $topRec->getHeldPrefecture() }}</span>
              </div>
              <div class="recruitment-title">
                <a href="{{ route('detail-recruitment', ['id' => $topRec->getRecruitmentId()]) }}" class="link">{{ $topRec->getTitle() }}</a>
              </div>
              <div class="mount">{{ $topRec->getMount() }}</div>
              @if($topRec->afterDeadline())
                <div class="mt15">
                  <div class="btn black">本イベントは終了しました</div>
                </div>
              @else
                <div class="mt15">
                  <button type="button" class="btn dark cancel" data-url="{{ route('attend.cancel', ['id' => $topRec->getRecruitmentId()]) }}"
                          data-recruitment-id="{{ $topRec->getRecruitmentId() }}">
                    キャンセルする
                  </button>
                </div>
              @endif
            </div>
            <div class="recruitment-capacity">
              <div class="count font20">{{ $topRec->getEntryCount() }}人</div>
              <div class="max">／定員{{ $topRec->getCapacity() }}人</div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
