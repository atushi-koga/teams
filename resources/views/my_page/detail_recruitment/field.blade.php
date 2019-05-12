<div class="row">
  <div class="col-sm-8 event">
    <div class="title detail-title">
      <div class="detail-title-date">
        <p class="detail-title-month">5月</p>
        <p class="detail-title-day">18</p>
      </div>
      <div>
        <h3>使ってわかる初めてのDocker</h3>
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
            <span class="capacity-count">3人</span> ／ 定員6人
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="content">
      <span>イベント内容</span>
    </div>
    <div class="content-item">行動予定</div>
    <div class="content-detail">これから仕事にいかしていきたい方向けに、Web開発の基本について取り扱います。 前半部分では簡単にWebの仕組みやHTML、CSS、JSやWeb開発のフレームワークなど についての概論について解説させていただきます。</div>
    <div class="content-item">活動日程</div>
    <div class="content-detail">2019/5/18</div>
    <div class="content-item">対象者</div>
    <div class="content-detail">時間とルールを守れる方</div>
    <div class="content-item">持ち物</div>
    <div class="content-detail">昼食、保険証、登山靴</div>
    <div class="content">
      <span>注意事項</span>
    </div>
    <div>
      ※ 参加を辞退する場合は、詳細ページより申込のキャンセルをお願い致します。<br>
      ※ 無断キャンセル・欠席が続く場合、次回以降の参加をお断りさせていただく場合がございます。何卒ご理解とご協力をお願い致します。
    </div>
    <div class="mt20 ac">
      <button type="submit" class="btn">参加する</button>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="event-aside">
      <h2 class="event-aside-header mb-0">管理者</h2>
      <div class="event-aside-body">田中tarouさん</div>
    </div>
    <div class="event-aside">
      <h2 class="event-aside-header mb-0">活動日時</h2>
      <div class="event-aside-body ac font16">
        <p class="mb-0">2019年5月18日(土)</p>
        <p>13:00～18:00</p>
      </div>
    </div>
    <div class="event-aside">
      <h2 class="event-aside-header mb-0">参加者（12人）</h2>
      <div class="event-aside-body"><a href="" class="txt-black txt-underline">佐藤 一郎 さん</a></div>
      <div class="event-aside-body"><a href="" class="txt-black txt-underline">高橋 二郎 さん</a></div>
      <div class="event-aside-body"><a href="" class="txt-black txt-underline">山田 三郎 さん</a></div>
    </div>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-4 col-form-label text-md-right" for="title"></label>
  <div class="col-md-6">
    <div>企画者</div>
    <div>{{ $response->createUserInfo->getUserId() }}</div>
    <div>{{ $response->createUserInfo->getNickname() }}</div>
    <div>{{ $response->createUserInfo->gender->getValue() }}</div>
    <div>{{ $response->createUserInfo->prefecture->getValue() }}</div>
    <div>{{ $response->createUserInfo->birthday->calculateAge()->getValue() }}歳</div>

    <br>
    @if($response->browsingUserIsCreateUser())
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="button" class="btn btn-primary">
            編集する
          </button>
        </div>
      </div>
    @endif
    <div>{{ $response->recruitment->getTitle() }}</div>
    <div>{{ $response->recruitment->getMount() }}</div>
    <div>{{ $response->recruitment->getPrefectureValue() }}</div>
    <div>{{ $response->recruitment->getSchedule() }}</div>
    <div>{{ $response->recruitment->getFormatDate() }}</div>
    <div>{{ $response->recruitment->getCapacityValue() }}</div>
    <div>{{ $response->recruitment->getFormatDeadline() }}</div>

    <br>
    <div>参加者</div>
    <div>
      @foreach($response->participantInfoList as $participantInfo)
        <div>{{ $participantInfo->getNickname() }}</div>
        <div>{{ $participantInfo->gender->getValue() }}</div>
        <div>{{ $participantInfo->prefecture->getValue() }}</div>
        <div>{{ $participantInfo->birthday->calculateAge()->getValue() }}歳</div>
      @endforeach
    </div>
    @if(!$response->browsingUserIsCreateUser())
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button id="join-btn" type="button" class="btn btn-primary"
                  data-user-id="{{ $response->getBrowsingUserId() }}" data-join-url="{{ route('detail-recruitment.join', ['id' => $response->getBrowsingUserId()]) }}"
                  data-recruitment-id="{{ $response->recruitment->getId() }}"
          >
            参加する
          </button>
        </div>
      </div>
    @endif
  </div>
</div>
