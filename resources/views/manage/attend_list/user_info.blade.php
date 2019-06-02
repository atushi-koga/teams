<div class="content-box">
  <div class="content-header">
    参加者一覧
  </div>
  <div class="content-body">
    @if(count($res) === 0)
      <div>現在の参加者はいません。</div>
    @else
      @foreach($res as $r)
        <div class="user">
          <div class="user-info">
            <div class="user-image-box">
              <img src="/default_icon.jpeg" class="user-image">
            </div>
            <div>
              <div class="font18"><a href="{{ route('user.profile', ['id' => $r->getUserId()]) }}">{{ $r->getNickname() }}</a></div>
              <div class="font16">
                {{ $r->getGenderValue() }} {{ $r->getUserAge() }}歳
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>
