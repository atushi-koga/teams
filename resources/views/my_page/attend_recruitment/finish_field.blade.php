<div class="content-area">
  <div class="area">
    <span class="label-area">関東</span> <span class="mount">{{ $res->getMount() }}</span>
  </div>
  <div>
    {{ $res->getHeldDay() }}
  </div>
  <div class="recruitment-conf-title">{{ $res->getTitle() }}</div>
  <div class="finish-text">
    参加申込が完了しました。登録情報は「参加申込一覧」よりご確認いただけます。
  </div>
  <div class="ac mt15 mb15">
    <a href="{{ route('attend.list') }}" class="btn green">参加申込一覧へ</a>
  </div>
</div>
