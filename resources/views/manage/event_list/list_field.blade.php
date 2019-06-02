<div>
  <div class="flex-sb">
    <div class="content-header">
      作成イベント
    </div>
    <div class="pb30">
      <a href="{{ route('manage-event.create') }}" class="btn btn-primary">イベントを作成</a>
    </div>
  </div>
  <div class="content-body">
    @if(count($res) === 0)
      <div>作成したイベントはありません</div>
    @else
      @foreach($res as $createdRec)
        <div class="recruitment">
          <div>
            <div class="mb10">
              <span class="label-area">{{ $createdRec->getHeldPrefecture() }}</span><span class="ml10">{{ $createdRec->getMount() }}</span>
            </div>
            <div class="recruitment-title mb10">
              <a href="{{ route('detail-recruitment', ['id' => $createdRec->getRecruitmentId()]) }}" target="_blank" class="link">{{ $createdRec->getTitle() }}</a>
            </div>
          </div>
          <div class="recruitment-info">
            <div class="recruitment-image-box">
              <a href="{{ route('detail-recruitment', ['id' => $createdRec->getRecruitmentId()]) }}" target="_blank" class="link"><img class="recruitment-image" src="/app_icon.jpeg"></a>
            </div>
            <div class="recruitment-outline">
              <div class="font16">{{ $createdRec->getHeldYear() }}/{{ $createdRec->getHeldDate() }}</div>
              <div class="font16">{{ $createdRec->getEntryCount() }}人／定員{{ $createdRec->getCapacity() }}人</div>
              <div>
                <a href="{{ route('manage-attend.list', ['id' => $createdRec->getRecruitmentId()]) }}"> 参加者一覧 </a>
              </div>
            </div>
          </div>
          <div class="mt10">
            @if($createdRec->afterDeadline())
              {{--@todo: 開催期間を過ぎたらこの表示をだす。今は募集締め切りが条件になってしまっている。--}}
              <div class="end">本イベントは終了しました</div>
            @else
              <div class="d-inline-block">
                <a href="{{ route('manage-event.editForm', ['id' => $createdRec->getRecruitmentId()]) }}" type="button" class="btn btn-primary"> 編集 </a>
              </div>
              <div class="d-inline-block">
                <button type="button" class="btn dark delete-event" data-url="{{ route('manage-event.remove', ['id' => $createdRec->getRecruitmentId()]) }}"
                        data-recruitment-id="{{ $createdRec->getRecruitmentId() }}">
                  削除
                </button>
              </div>
            @endif
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>
