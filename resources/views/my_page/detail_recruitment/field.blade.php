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
    <div class="mt20 ac">
      @if($res->browsingUserIsCreateUser())
        <a href="" class="btn btn-primary">編集する</a>
      @else
        {{--未申込の場合--}}
        <a href="" class="btn green">参加する</a>
      @endif
      {{--申込済みの場合--}}
      {{--はいを選択すると、キャンセルしましたの文言を確認ダイアログ上に表示しページを再読み込みする。--}}
      {{--<a href="" class="btn dark" onclick="confirm('参加申込をキャンセルします。よろしいですか？')">キャンセルする</a>--}}
      {{--開催日を過ぎた場合--}}
      {{--<div class="btn black">本イベントは終了しました</div>--}}
    </div>
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
        <p class="mb-0 font16">13:00～18:00</p>
      </div>
      <div class="ac">
        @if($res->browsingUserIsCreateUser())
          <a href="" class="btn btn-primary">編集する</a>
        @else
          {{--未申込の場合--}}
          <a href="" class="btn green">参加する</a>
        @endif
      </div>
    </div>
    <div class="event-aside">
      <h2 class="event-aside-header mb-0">参加者（{{ $res->getEntryCount() }}人）</h2>
      @foreach($res->getParticipantInfoList() as $userInfo)
        <div class="event-aside-body"><a href="" class="txt-black txt-underline">{{ $userInfo->getNickname() }} さん</a></div>
      @endforeach
    </div>
  </div>
</div>
