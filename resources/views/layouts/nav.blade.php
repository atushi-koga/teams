<nav class="header header-border navbar navbar-expand-md navbar-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('top') }}">
      {{ config('app.name') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('showLoginForm') }}">ログイン</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('showRegistrationForm') }}">新規会員登録</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('manage-event.list') }}" role="button">
              {{ __('recruitment.manage_event') }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('attend.list') }}" role="button"> 参加申込一覧 </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('account.detail') }}" role="button">会員情報 </a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
