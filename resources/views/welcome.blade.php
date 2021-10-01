@extends('layouts.app')

<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
<div class='explanation'>
  <h3>DEMO</h3>
  <div class='demo'>
    <img src="{{ asset('img/TOPpage.gif') }}" class="GIF">
    <div class='howTo'>
      <div class='function'>1.予定を登録する。</div>
      <div class='function'>2.友達を選択して更新。</div>
      <div class='function'>+ Google calendarからの取り込み</div>
    </div>
  </div> 
</div>
@endsection
