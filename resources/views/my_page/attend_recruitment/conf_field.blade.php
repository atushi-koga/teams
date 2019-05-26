<div class="content-area">
  <div class="area">
    <span class="label-area">関東</span> <span class="mount">{{ $res->getMount() }}</span>
  </div>
  <div>
    {{ $res->getHeldDay() }}13:00～21:00
  </div>
  <div class="recruitment-conf-title">{{ $res->getTitle() }}</div>
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
    <span>注意事項</span>
  </div>
  <div>
    ※ 参加を辞退する場合は、詳細ページより申込のキャンセルをお願い致します。<br> ※ 無断キャンセル・欠席が続く場合、次回以降の参加をお断りさせていただく場合がございます。何卒ご理解とご協力をお願い致します。
  </div>
  <form method="post" action="{{ route('attend-recruitment.join', ['id' => $res->getRecruitmentId()]) }}">
    @csrf
    <input type="hidden" name="recruitment_id" value="{{ $res->getRecruitmentId() }}">
    <div class="ac mt20">
      <button type="submit" class="btn green">参加を確定する</button>
    </div>
  </form>
</div>
