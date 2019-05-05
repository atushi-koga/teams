@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">募集情報</div>
          <div class="card-body">
            @foreach($response->recruitment as $recruitment)
              <div>
                <p><a href="{{ route('detail-recruitment.detail', ['id' => $recruitment->getId()]) }}">{{ $recruitment->getTitle() }}</a></p>
                <p>{{ $recruitment->getMount() }}</p>
                <p>{{ $recruitment->getPrefectureKey() }}</p>
                <p>{{ $recruitment->getPrefectureValue() }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
