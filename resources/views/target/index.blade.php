@extends('adminlte::page')

@section('title', '贈る人一覧')

@section('content_header')
    <h1>贈る人一覧&nbsp;<img src="/img/アイコン/キー.png" class="key-icon"></h1>
@stop

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<style>
    .img{
        border-radius: 50%;
        width: 110px;
    }

    .event-icon{
        width: 50px;
    }

    .w40{
        width: 40%;
    }

    .key-icon{
        width: 100px;
    }

    .content-wrapper {
        overflow-y: auto;
    }

</style>

@section('content')
<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white shadow">

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-outline-secondary bg-secondary-subtle me-md-2" href="orderByDay">贈る日順△</a>
    <a class="btn btn-success w-25" href="/target/register">新規登録</a>
</div><br>

@foreach ($target as $value)
<div class="card border boder-3 rounded-4" style="width: 90%">
    <div class="row no-gutters">
            <h4 class="card-header rounded-top-4 @if($value->status == "1")bg-danger-subtle @elseif($value->status == "2")bg-info-subtle @else($value->status == "3")bg-success-subtle @endif">
                <font color="#818181"><b>{{ config('status.status.'.$value->status) }}</b></font>
            </h4>
            <div class="card-body row-cols-md-4 d-flex align-items-center justify-content-md-center">
                <div class="col">
                    @if($value->event == "1")<img src="/img/アイコン/ホールケーキのフリーアイコン 2.png" class="event-icon">&emsp;<mark class="bg-danger-subtle rounded-3">&emsp;誕生日&emsp;</mark>
                    @elseif($value->event == "2")<img src="/img/アイコン/クリスマスツリーアイコン9.png" class="event-icon">&emsp;<mark class="bg-success-subtle rounded-3">&emsp;クリスマス&emsp;</mark>
                    @elseif($value->event == "3")<img src="/img/アイコン/花束アイコン1.png" class="event-icon">&emsp;<mark class="bg-warning-subtle rounded-3">&emsp;母の日&emsp;</mark>
                    @elseif($value->event == "4")<img src="/img/アイコン/花束アイコン2.png" class="event-icon">&emsp;<mark class="bg-primary-subtle rounded-3">&emsp;父の日&emsp;</mark>
                    @elseif($value->event == "5")<img src="/img/アイコン/プレゼントアイコン (1).png" class="event-icon">&emsp;<mark class="bg-info-subtle rounded-3">&emsp;敬老の日&emsp;</mark>
                    @else($value->event == "6")<img src="/img/アイコン/プレゼントアイコン.png" class="event-icon">&emsp;<mark class="bg-secondary-subtle rounded-3">&emsp;その他&emsp;</mark>
                    @endif
                </div>
                <div class="col"> 
                    @if($value->image!=null)<img src="data:image/jpg;base64,{{ $value->image }}" class="img ml-5">@else<img src="/img/noimage.png" class="ml-3">@endif
                </div>
                <div class="col">
                    <h5><span class="badge bg-secondary">名前</span>&emsp;{{ $value->name }}</h5>
                    <h5><span class="badge bg-secondary">贈る日</span>&emsp;{{ $value->xday }}</h5>
                </div>
                <div class="col">
                    <a class="p-2 btn btn-info w40" href="/target/information/{{$value->id}}">情報</a>
                    <a class="p-2 btn btn-secondary w40 ml-2" href="/target/edit/{{$value->id}}">編集</a>
                </div>
            </div>
    </div>
    @php
        $toDate = new DateTime($value->xday);
        $fromDate = new DateTime('now');
        $toDate->setTime(0,0,0);
        $fromDate->setTime(0,0,0);
        $time = $fromDate->diff($toDate);
    @endphp
    <div class="card-footer text-body-secondary @if( $toDate < $fromDate ) bg-secondary-subtle @elseif( $time->days == 0) bg-danger-subtle @else bg-warning-subtle @endif">
        <font size="4">
            @if( $time->invert == 1 )
            <div class="d-flex flex-row">
                <div class="p-2">
                    <font size="3"><b>{{ $time->days }}</b></font>日が過ぎました&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;→&emsp;→&emsp;→&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                </div>
                <div class="p-2 ml5">
                    <form method="post" action="/targetClone/{{$value->id}}">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark bg-danger-subtle btn-sm shadow">今年のレコードを<b>削除して</b>来年の予定を追加する<br>(内容は引き継がれます)</button>
                    </form>
                </div>
            </div>
            @elseif( $time->days == 0 ) 
                <b>当日となりました！</b>
            @else
                あと<b>{{ $time->days }}</b>日です
            @endif
        </font>
    </div>
</div>
@endforeach
    <div class="justify-content-end">
    {{ $target->links('pagination::bootstrap-4') }}
    </div>
@stop