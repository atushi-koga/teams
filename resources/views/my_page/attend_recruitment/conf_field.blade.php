<div class="content-area">
  <div class="area">
    <span class="label-area">関東</span> <span class="mount">高尾山</span>
  </div>
  <div>
    2019/5/18(土)13:00～21:00
  </div>
  <div class="recruitment-conf-title">武蔵小杉もくもく会</div>
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
    <span>注意事項</span>
  </div>
  <div>
    ※ 参加を辞退する場合は、詳細ページより申込のキャンセルをお願い致します。<br> ※ 無断キャンセル・欠席が続く場合、次回以降の参加をお断りさせていただく場合がございます。何卒ご理解とご協力をお願い致します。
  </div>
  <form method="post" action="{{ route('attend-recruitment.join', ['id' => 2]) }}">
    @csrf
    <input type="hidden" name="recruitment_id" value="2">
    <div class="ac mt20">
      <button type="submit" class="btn">参加を確定する</button>
    </div>
  </form>
</div>
