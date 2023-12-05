@extends('adminlte::page')

@section('title', '検索')

@section('content_header')
    <h1>検索&nbsp;<img src="/img/アイコン/キー.png" class="key-icon"></h1>
@stop

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>登録画面</title>
</head>

<style>
    .card-img-bottom{
        width: 80px;
    }

    .w30{
        width: 30%;
    }

    .key-icon{
        width: 100px;
    }

    .content-wrapper {
        overflow-y: auto;
    }

</style>

<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white shadow">

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/target/index">>>一覧画面へ戻る</a>
</div>

<div class="card"> 
  <h5 class="card-header bg-dark-subtle">名前で探す</h5>
  <div class="card-body">
  <form action="/target/searchName" method="get" autocomplete="off">
        @csrf
            <div class="input-group w30 d-flex flex-row justify-content">
                <input type="search" class="form-control" placeholder="名前を入力" name="keyword">
                <button type="submit" class="btn btn-outline-secondary bg-secondary-subtle">検索</button>  
            </div>
        </form>
  </div>
</div>

<div class="card">
    <h5 class="card-header bg-dark-subtle">イベントで探す</h5>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-6 g-4">
                <div class="col">
                    <div class="card h-100">
                        <h6 class="card-header no-guetter text-center">誕生日</h6>
                        <div class="card-body d-flex align-items-center ml-3">
                            <a href="{{ url('target/searchEvent1') }}" class="stretched-link"><img src="/img/アイコン/ホールケーキのフリーアイコン 2.png" class="card-img-bottom"></a>
                        </div>  
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <h6 class="card-header no-guetter text-center">クリスマス</h6>
                        <div class="card-body d-flex align-items-center ml-3">
                            <a href="{{ url('target/searchEvent2') }}" class="stretched-link"><img src="/img/アイコン/クリスマスツリーアイコン9.png" class="card-img-bottom"></a>
                        </div>  
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <h6 class="card-header no-guetter text-center">母の日</h6>
                        <div class="card-body d-flex align-items-center ml-3">
                            <a href="{{ url('target/searchEvent3') }}" class="stretched-link"><img src="/img/アイコン/花束アイコン2.png" class="card-img-bottom"></a>
                        </div>  
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <h6 class="card-header no-guetter text-center">父の日</h6>
                        <div class="card-body d-flex align-items-center ml-3">
                            <a href="{{ url('target/searchEvent4') }}" class="stretched-link"><img src="/img/アイコン/花束アイコン1.png" class="card-img-bottom"></a>
                        </div>  
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <h6 class="card-header no-guetter text-center">敬老の日</h6>
                        <div class="card-body d-flex align-items-center ml-3">
                            <a href="{{ url('target/searchEvent5') }}" class="stretched-link"><img src="/img/アイコン/プレゼントアイコン (1).png" class="card-img-bottom"></a>
                        </div>  
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <h6 class="card-header no-guetter text-center">その他</h6>
                        <div class="card-body d-flex align-items-center ml-3">
                            <a href="{{ url('target/searchEvent6') }}" class="stretched-link"><img src="/img/アイコン/プレゼントアイコン.png" class="card-img-bottom"></a>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="card">
  <h5 class="card-header bg-dark-subtle">ステータスで探す</h5>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col">
                <div class="card h-60">
                    <h6 class="card-header no-guetter"></h6>
                        <div class="card-body">
                            <h4 class="text-center"><mark class="bg-danger-subtle rounded-3">&emsp;考え中…&emsp;</mark></h4>
                        </div>
                    <a href="{{ url('target/searchStatus1') }}" class="stretched-link"></a>     
                </div>
            </div>
            <div class="col">
                <div class="card h-60">
                    <h6 class="card-header no-guetter"></h6>
                        <div class="card-body">
                            <h4 class="text-center"><mark class="bg-info-subtle rounded-3">&emsp;決めた！&emsp;</mark></h4>
                        </div>
                    <a href="{{ url('target/searchStatus2') }}" class="stretched-link"></a>     
                </div>
            </div>
            <div class="col">
                <div class="card h-60">
                    <h6 class="card-header no-guetter"></h6>
                        <div class="card-body">
                            <h4 class="text-center"><mark class="bg-success-subtle rounded-3">&emsp;購入済み&emsp;</mark></h4>
                        </div>
                    <a href="{{ url('target/searchStatus3') }}" class="stretched-link"></a>     
                </div>
            </div>
        </div>
    </div>
</div><br>
@stop