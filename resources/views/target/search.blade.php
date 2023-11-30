@extends('adminlte::page')

@section('title', '贈る人一覧')

@section('content_header')
    <h1>検索</h1>
@stop

@section('content')

<body>
<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white">
    <h4>イベントで探す</h4>
<a href="{{ url('target/searchEvent1') }}" class="btn btn-default">誕生日</a>
<a href="{{ url('target/searchEvent2') }}" class="btn btn-default">クリスマス</a>
<a href="{{ url('target/searchEvent3') }}" class="btn btn-default">母の日</a>
<a href="{{ url('target/searchEvent4') }}" class="btn btn-default">父の日</a>
<a href="{{ url('target/searchEvent5') }}" class="btn btn-default">敬老の日</a>
<a href="{{ url('target/searchEvent6') }}" class="btn btn-default">その他</a>

<h4>ステータスで探す</h4>
<a href="{{ url('target/searchStatus1') }}"><img src="/img/status/考え中.png"></a>
<a href="{{ url('target/searchStatus2') }}"><img src="/img/status/決めた.png"></a>
<a href="{{ url('target/searchStatus3') }}"><img src="/img/status/購入済み.png"></a>

<h4>名前で探す</h4>
<form action="/target/searchName" method="get" autocomplete="off">
  @csrf
    <div class="input-group w30-2 d-flex flex-row justify-content">
      <input type="search" class="form-control" placeholder="お名前を入力" name="keyword">
      <button type="submit" class="btn btn-primary">検索</button>  
    </div>
  </form>
</div>
</body>
@endsection