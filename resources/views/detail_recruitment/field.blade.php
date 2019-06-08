<div class="row">
  <div class="col-sm-8 event">
    <div class="title detail-title">
      <div>
        <h3>{{ $res->getTitle() }}</h3>
      </div>
    </div>
    {{--画像があれば表示--}}
    <div>
    </div>
    <div>
      <table class="mt20">
        <tbody>
        <tr>
          <th class="capacity-th">参加枠</th>
          <td>
            <span class="capacity-count">{{ $res->getEntryCount() }}人</span> ／ 定員{{ $res->getCapacity() }}人
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="content">
      <span>イベント内容</span>
    </div>
    <div class="content-item">行動予定</div>
    <div class="content-detail">{{ $res->getSchedule() }}</div>
    <div class="content-item">活動日程</div>
    <div class="content-detail">{{ $res->getHeldDay() }}</div>
    <div class="content-item">募集締め切り</div>
    <div class="content-detail">{{ $res->getDeadlineDay() }}</div>
    <div class="content-item">対象者</div>
    <div class="content-detail">{{ $res->getRequirement() }}</div>
    @if(!empty($res->getBelongings))
      <div class="content-item">持ち物</div>
      <div class="content-detail">{{ $res->getBelongings() }}</div>
    @endif
    @if(!empty($res->getNotes()))
      <div class="content-item">ご参加にあたってのお願い</div>
      <div class="content-detail">{{ $res->getNotes() }}</div>
    @endif

    @if($res->afterDeadline())
      <div class="mt20 ac">
        <div class="end">募集を終了しました</div>
      </div>
    @elseif($res->browsingUserIsCreateUser())
    @elseif($res->haveEntry())
      <div class="mt20 ac">
        <button type="button" class="btn dark cancel" data-url="{{ route('attend.cancel', ['id' => $res->getRecruitmentId()]) }}"
                data-recruitment-id="{{ $res->getRecruitmentId() }}">
          キャンセルする
        </button>
      </div>
    @else
      <div class="mt20 ac">
        <a href="{{ route('attend-recruitment.showConf', ['id' => $res->getRecruitmentId() ]) }}" class="btn green">参加する</a>
      </div>
    @endif
  </div>
  <div class="col-sm-4">
    <div class="event-aside">
      <h2 class="event-aside-header mb-0">管理者</h2>
      <div class="event-aside-body">{{ $res->getCreateUserNickname() }} さん</div>
    </div>
    <div class="event-aside">
      <h2 class="event-aside-header mb-0">活動日時</h2>
      <div class="event-aside-body ac">
        <p class="mb-0 font18">{{ $res->getHeldDay() }}</p>
      </div>
      @if($res->afterDeadline())
        <div class="ac">
          <div class="end">募集を終了しました</div>
        </div>
      @elseif($res->browsingUserIsCreateUser())
      @elseif($res->haveEntry())
        <div class="ac">
          <button type="button" class="btn dark cancel" data-url="{{ route('attend.cancel', ['id' => $res->getRecruitmentId()]) }}"
                  data-recruitment-id="{{ $res->getRecruitmentId() }}">
            キャンセルする
          </button>
        </div>
      @else
        <div class="ac">
          <a href="{{ route('attend-recruitment.showConf', ['id' => $res->getRecruitmentId() ]) }}" class="btn green">参加する</a>
        </div>
      @endif
    </div>
    <div class="event-aside">
      <h2 class="event-aside-header mb-0">参加者（{{ $res->getEntryCount() }}人）</h2>
      @foreach($res->getParticipantInfoList() as $userInfo)
        <div class="event-aside-body">
          <a href="{{ route('user.profile', ['id' => $userInfo->getUserId()]) }}" class="txt-black txt-underline">{{ $userInfo->getNickname() }} さん</a>
        </div>
      @endforeach
    </div>
  </div>
</div>
