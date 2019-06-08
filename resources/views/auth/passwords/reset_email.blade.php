<!DOCTYPE html>
<html lang="ja">
<style>
  body {
    background-color: white;
  }

  .btn.green {
    background-color: #0a8443;
  }

  .btn-box {
    max-width: 300px;
    margin-right: auto;
    margin-left: auto;
  }

  .btn {
    display: inline-block;
    padding: 10px 30px;
    border: none;
    border-radius: 4px;
    background-image: none;
    color: #fff;
    font-family: inherit;
    font-size: 16px;
    text-decoration: none;
    -webkit-appearance: none;
    margin: 5px;
  }

  .btn:focus,
  .btn:hover,
  .btn:active {
    outline: none;
    opacity: 0.7;
    color: #fff;
  }
</style>
<body>
<div>
  <p>{{ $nickName }} さん</p>
  <p>パスワードの変更がリクエストされました。パスワードを再設定するには、以下のボタンをクリックしてください。</p>
</div>
<div class="btn-box">
  <a class="btn green" href="{{ route('password.reset', ['token' => $token]) }}">パスワードをリセットする</a>
</div>
<div>
  <p>※このリンクの有効期限は 24 時間 です。有効期限を過ぎた場合はお手数ですが、もう一度<a href="{{ route('password.showForm') }}">パスワードの再設定</a>をリクエストしてください。</p>
  <p>{{ config('app.name') }}</p>
</div>
</body>
</html>
