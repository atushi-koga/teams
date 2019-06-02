<div>
  <div class="content-header">
    申込済みのイベント
  </div>
  <div class="content-body">
    @if(count($res) === 0)
      <div>申込済みのイベントはありません。</div>
    @else
      @foreach($res as $topRec)
        <div class="recruitment">
          <div>
            <div class="mb10">
              <span class="label-area">{{ $topRec->getHeldPrefecture() }}</span><span class="ml10">{{ $topRec->getMount() }}</span>
            </div>
            <div class="recruitment-title mb10">
              <a href="{{ route('detail-recruitment', ['id' => $topRec->getRecruitmentId()]) }}" target="_blank" class="link">{{ $topRec->getTitle() }}</a>
            </div>
          </div>
          <div class="recruitment-info">
            <div class="recruitment-image-box">
              <a href="{{ route('detail-recruitment', ['id' => $topRec->getRecruitmentId()]) }}" target="_blank" class="link"><img class="recruitment-image" src="/app_icon.jpeg"></a>
            </div>
            <div class="recruitment-outline">
              <div class="font16">{{ $topRec->getHeldYear() }}/{{ $topRec->getHeldDate() }}</div>
              <div class="font16">{{ $topRec->getEntryCount() }}人／定員{{ $topRec->getCapacity() }}人</div>
              <div>
                <a href="{{ route('user.profile', ['id' => $topRec->getCreateUserId()]) }}" class="link"> <img class="owner-icon" src="/default_icon.jpeg" alt="">
                  <span class="font14">{{ $topRec->getCreateUserNickname() }} さん</span> </a>
              </div>
            </div>
          </div>
          <div class="mt10">
            @if($topRec->afterDeadline())
              {{--@todo: 開催期間を過ぎたらこの表示をだす。今は募集締め切りが条件になってしまっている。--}}
              <div class="end">本イベントは終了しました</div>
            @else
              <button type="button" class="btn dark cancel" data-url="{{ route('attend.cancel', ['id' => $topRec->getRecruitmentId()]) }}"
                      data-recruitment-id="{{ $topRec->getRecruitmentId() }}">
                キャンセルする
              </button>
            @endif
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>
