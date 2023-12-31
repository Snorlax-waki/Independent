@extends('adminlte::page')

@section('title', '一覧画面')

@section('content_header')
    <h1>贈る人一覧&nbsp;<img src="/img/アイコン/キー.png" class="key-icon"></h1>
@stop

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

@section('content')
<div align="right">
    <a class="btn btn-success w20 mr-2 text-center" href="/target/register">新規登録</a>
</div>

<div class="container mt-2 pt-3 pb-3 pt-lg-3 pb-lg-5 px-lg-5 bg-white shadow">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-1">
        <a href="/target/index" class="underline mr-3">▼最新登録順▼</a>
        <a href="orderByDay" class="underline mr-2">▲贈る日が近い順▲</a>    
    </div>

@if (session('flash_message'))
    <div class="flash_message alert alert-info opacity-70" id="flash_message">
        {{ session('flash_message') }}
    </div>
@endif

@foreach ($target as $value)
<div class="card border boder-3 rounded-4" style="width: auto">
    <div class="row no-gutters">
            <h4 class="card-header rounded-top-4 @if($value->status == "1")bg-danger-subtle @elseif($value->status == "2")bg-info-subtle @else($value->status == "3")bg-success-subtle @endif">
                <font color="#818181"><b>{{ config('status.status.'.$value->status) }}</b></font>
            </h4>
            <div class="card-body row-cols-md-4 d-flex align-items-center justify-content-md-center">
                <div class="col">
                    @if($value->event == "1")<img src="/img/アイコン/ホールケーキのフリーアイコン 2.png" class="event-icon mr-2 mb-2"><mark class="bg-danger-subtle rounded-3 event-name">&emsp;誕生日&emsp;</mark>
                    @elseif($value->event == "2")<img src="/img/アイコン/クリスマスツリーアイコン9.png" class="event-icon mr-2 mb-2"><mark class="bg-success-subtle rounded-3 event-name">&emsp;クリスマス&emsp;</mark>
                    @elseif($value->event == "3")<img src="/img/アイコン/花束アイコン2.png" class="event-icon mr-2 mb-2"><mark class="bg-warning-subtle rounded-3 event-name">&emsp;母の日&emsp;</mark>
                    @elseif($value->event == "4")<img src="/img/アイコン/花束アイコン1.png" class="event-icon mr-2 mb-2"><mark class="bg-info-subtle rounded-3 event-name">&emsp;父の日&emsp;</mark>
                    @elseif($value->event == "5")<img src="/img/アイコン/プレゼントアイコン (1).png" class="event-icon mr-2 mb-2"><mark class="bg-primary-subtle rounded-3 event-name">&emsp;敬老の日&emsp;</mark>
                    @else($value->event == "6")<img src="/img/アイコン/プレゼントアイコン.png" class="event-icon mr-2 mb-2"><mark class="bg-secondary-subtle rounded-3 event-name">&emsp;その他&emsp;</mark>
                    @endif
                </div>
                <div class="col"> 
                    @if($value->image!=null)<img src="data:image/jpg;base64,{{ $value->image }}" class="img">@else<img src="/img/noimage.png" class="img">@endif
                </div>
                <div class="col">
                    <h5 class="top-menu"><span class="badge bg-secondary">名前</span>&emsp;{{ $value->name }}</h5>
                    <h5 class="top-menu"><span class="badge bg-secondary">贈る日</span>&emsp;{{ $value->xday }}</h5>
                </div>
                <div class="col">
                    <a class="p-2 btn btn-info w40 mr-2" href="/target/information/{{$value->id}}">情報</a>
                    <a class="p-2 btn btn-secondary w40" href="/target/edit/{{$value->id}}">編集</a>
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
    <div class="card-footer rounded-bottom-4 text-body-secondary @if( $toDate < $fromDate ) bg-secondary-subtle @elseif( $time->days == 0) bg-danger-subtle @else bg-warning-subtle @endif">
        <font size="4">
            @if( $time->invert == 1 )
            <div class="d-flex flex-row">
                <div class="p-2 res">
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

@section('css')
    <style>
        .img{
            border-radius: 50%;
            width: 110px;
        }

        .event-icon{
            width: 50px;
        }

        .oederByDay{
            width: 10%;
        }

        .w20{
            width: 20%;
            text-align: right;
        }

        .w40{
            width: 40%;
        }

        .key-icon{
            width: 100px;
        }

        .underline{
            text-decoration:underline;
            text-decoration-color: gray;
        }

        .content-wrapper {
            overflow-y: auto;
        }

        .flash_message{
            width: 90%;
        }

        @media screen and (max-width: 500px) {
            .oederByDay{
                width: 20%;
            }

            .top-menu{
                font-size: 1rem;
            }

            .event-name{
                font-size: .5rem;
                white-space: nowrap;
             }
         
            .w40{
                width: auto;
                margin-bottom: 2px;
            }

            .img{
                border-radius: 50%;
                width: 80px;
            }

            .res{
                font-size: .8rem;
                white-space: nowrap;
            }
        }
    </style>
@stop

@section('js')
    <script>
        //////レコード複製時のフラッシュメッセージ//////
        (function() {
            'use strict';
            $(function(){
                $('.flash_message').fadeOut(3000);
            });
        })();
    </script>
@stop