<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>トップ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/base.css">
  {{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}
</head>
<body>
@include('layouts.nav')
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
