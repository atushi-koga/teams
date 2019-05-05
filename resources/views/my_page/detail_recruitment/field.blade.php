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
          <button type="button" class="btn btn-primary">
            参加する
          </button>
        </div>
      </div>
    @endif
  </div>
</div>
