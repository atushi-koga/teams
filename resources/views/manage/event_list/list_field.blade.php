<div class="content-box">
  <div class="content-head">
    <div class="list-title">
      作成イベント
    </div>
    <div>
      <a href="{{ route('manage-event.create') }}" class="btn btn-primary">イベント作成</a>
    </div>
  </div>
  <div class="list-box">
    @if(count($res) === 0)
      <div class="recruitment-list">
        作成したイベントはありません
      </div>
    @else
      @foreach($res as $createdRec)
        <div class="recruitment-list">
          <div class="recruitment-date">
            <div class="year">{{ $createdRec->getHeldYear() }}</div>
            <div class="day">{{ $createdRec->getHeldDate() }}</div>
            <div class="time">13:00～21:00</div>
          </div>
          <div class="recruitment">
            <div class="recruitment-info">
              <div class="recruitment-image-box">
                <a href="{{ route('detail-recruitment', ['id' => $createdRec->getRecruitmentId()]) }}" target="_blank" class="link"><img class="recruitment-image" src="/test_img.png"></a>
              </div>
              <div class="recruitment-outline">
                <div class="area">
                  <span class="label-area">{{ $createdRec->getHeldPrefecture() }}</span>
                </div>
                <div class="recruitment-title">
                  <a href="{{ route('detail-recruitment', ['id' => $createdRec->getRecruitmentId()]) }}" class="link">{{ $createdRec->getTitle() }}</a>
                </div>
                <div class="mount">{{ $createdRec->getMount() }}</div>
                @if($createdRec->afterDeadline())
                  <div class="mt15">
                    <div class="btn black">本イベントは終了しました</div>
                  </div>
                @else
                  <div class="mt15">
                    <div class="d-inline-block">
                      <a href="{{ route('manage-attend.list', ['id' => $createdRec->getRecruitmentId()]) }}" type="button" class="btn btn-primary"> 参加者一覧 </a>
                    </div>
                    <div class="d-inline-block">
                      <a href="{{ route('manage-event.editForm', ['id' => $createdRec->getRecruitmentId()]) }}" type="button" class="btn btn-primary"> 編集 </a>
                    </div>
                    <div class="d-inline-block">
                      <button type="button" class="btn dark delete-event" data-url="{{ route('manage-event.remove', ['id' => $createdRec->getRecruitmentId()]) }}"
                              data-recruitment-id="{{ $createdRec->getRecruitmentId() }}">
                        削除
                      </button>
                    </div>
                  </div>
                @endif
              </div>
              <div class="recruitment-capacity">
                <div class="count font20">{{ $createdRec->getEntryCount() }}人</div>
                <div class="max">／定員{{ $createdRec->getCapacity() }}人</div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>
