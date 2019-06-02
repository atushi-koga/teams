<div>
  <div class="content-header">イベント一覧</div>
  <div class="content-body">
    @foreach($res->recruitment as $topRec)
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
      </div>
    @endforeach
  </div>
</div>
