@extends('adminlte::page')

@section('content_header')
    <h1>{{ $target->name }}さんの<font size="10">KEY</font>&nbsp;<img src="/img/アイコン/キー.png" class="key-icon"></h1>
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
        width: 150px;
    }

    .bg-dark-subtle{
        width: 20%;
    }

    .bg-warning-subtle{
        width: 20%;
    }

    .ml-4{
        width: 50px;
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
    <a href="/target/index">>>一覧画面へ戻る</a>
</div>

<div class="card border boder-3 rounded-4" style="width: 90%">
    <div class="row no-gutters">
            <h4 class="card-header rounded-top-4 @if($target->status == "1")bg-danger-subtle @elseif($target->status == "2")bg-info-subtle @else($target->status == "3")bg-success-subtle @endif">
                <font color="#818181"><b>{{ config('status.status.'.$target->status) }}</b></font>
            </h4>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-4 d-flex align-items-center">
                    <div class="col">
                        @if($target->event == "1")<img src="/img/アイコン/ホールケーキのフリーアイコン 2.png" class="ml-4">&nbsp;<mark class="bg-danger-subtle rounded-3">&emsp;誕生日&emsp;</mark>
                        @elseif($target->event == "2")<img src="/img/アイコン/クリスマスツリーアイコン9.png" class="ml-4">&nbsp;<mark class="bg-success-subtle rounded-3">&emsp;クリスマス&emsp;</mark>
                        @elseif($target->event == "3")<img src="/img/アイコン/花束アイコン1.png" class="ml-4">&nbsp;<mark class="bg-warning-subtle rounded-3">&emsp;母の日&emsp;</mark>
                        @elseif($target->event == "4")<img src="/img/アイコン/花束アイコン2.png" class="ml-4">&nbsp;<mark class="bg-primary-subtle rounded-3">&emsp;父の日&emsp;</mark>
                        @elseif($target->event == "5")<img src="/img/アイコン/プレゼントアイコン (1).png" class="ml-4">&nbsp;<mark class="bg-info-subtle rounded-3">&emsp;敬老の日&emsp;</mark>
                        @else($target->event == "6")<img src="/img/アイコン/プレゼントアイコン.png" class="ml-4">&nbsp;<mark class="bg-secondary-subtle rounded-3">&emsp;その他&emsp;</mark>
                        @endif
                    </div>
                    <div class="col"> 
                        @if($target->image!=null)<img src="data:image/jpg;base64,{{ $target->image }}" class="img">@else<img src="/img/noimage.png" class="img">@endif
                    </div><br>
                    <div class="col">
                        <h4><span class="badge bg-secondary">名前</span>&nbsp;{{ $target->name }}</h4>
                    </div>
                    <div class="col">
                        <h4><span class="badge bg-secondary">贈る日</span>&nbsp;{{ $target->xday }}</h4>
                    </div>
                </div>
            </div><br>
    <table class="table table-bordered shadow-sm">
        <tbody>
            @if($target->present!=null)
                <tr>
                    <td class="bg-warning"><b>これに決めた！</b></td>
                    <td>○{{ $target->present }}
                    @if($target->pre_url!=null)<div class="auto-link">URL&nbsp;:&nbsp;{!! nl2br($pre_url) !!}</div>@endif
                    </td>
                </tr>
            @endif
            @if($target->budget!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>予算</b></td>
                    <td>{{ number_format($target->budget) }}円</td>
                </tr>
            @endif
            @if($target->hobby!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>趣味</b></td>
                    <td>{{ config('hobby.hobby.'.$target->hobby) }}
                    @if($target->hobby2!=null)&emsp;・&emsp;{{ config('hobby.hobby2.'.$target->hobby2) }}@endif
                    @if($target->hobby3!=null)&emsp;・&emsp;{{ config('hobby.hobby3.'.$target->hobby3) }}@endif
                    @if($target->hobby4!=null)&emsp;・&emsp;{{ config('hobby.hobby4.'.$target->hobby4) }}@endif
                    @if($target->hobby5!=null)&emsp;・&emsp;{{ config('hobby.hobby5.'.$target->hobby5) }}@endif
                    @if($target->hobby_other!=null)&emsp;・&emsp;{{ $target->hobby_other }}@endif</td>
                </tr>
            @endif
            @if($target->fav_color!=null && $target->fav_color!="#000000")
                <tr>
                    <td class="bg-dark-subtle"><b>好きな色</b></td>
                    <td>@if($target->fav_color == "#ea5550")<img src="/img/color/red.png">
                        @elseif($target->fav_color == "#00afcc")<img src="/img/color/blue.png">
                        @elseif($target->fav_color == "#ffff00")<img src="/img/color/yellow.png">
                        @elseif($target->fav_color == "#00ff00")<img src="/img/color/green.png">
                        @elseif($target->fav_color == "#eb6ea0")<img src="/img/color/pink.png">
                        @elseif($target->fav_color == "#ff9328")<img src="/img/color/orange.png">
                        @elseif($target->fav_color == "#915da3")<img src="/img/color/purple.png">
                        @elseif($target->fav_color == "#010101")<img src="/img/color/black.png">
                        @elseif($target->fav_color == "#ffffff")<img src="/img/color/white.png">
                        @else<font color="{{ $target->fav_color }}" size="6">●</font>@endif
                    </td>
                </tr>
            @endif
            @if($target->fav_food_drink!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>好きな食べ物・飲み物</b></td>
                    <td>{{ $target->fav_food_drink }}</td>
                </tr>
            @endif
            @if($target->fav_thing!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>その他好きなこと・もの</b></td>
                    <td>{{ $target->fav_thing }}</td>
                </tr>
            @endif
            @if($target->memo!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>MEMO</b></td>
                    <td>{!! nl2br(htmlspecialchars($target->memo)) !!}</td>
                </tr>
            @endif
            @if($target->idea!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>プレゼント候補</b>①</b></td>
                    <td>○{{ $target->idea }}
                    @if($target->url!=null)<div class="auto-link">URL&nbsp;:&nbsp;{!! nl2br($url) !!}</div>@endif
                    </td>
                </tr>
            @endif
            @if($target->idea2!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>プレゼント候補</b>②</td>
                    <td>○{{ $target->idea2 }}
                    @if($target->url2!=null)<div class="auto-link">URL&nbsp;:&nbsp;{!! nl2br($url2) !!}</div>@endif
                    </td>
                </tr>
            @endif
            @if($target->idea3!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>プレゼント候補</b>③</td>
                    <td>○{{ $target->idea3 }}
                    @if($target->url3!=null)<div class="auto-link">URL&nbsp;:&nbsp;{!! nl2br($url3) !!}</div>@endif
                    </td>
                </tr>
            @endif
            @if($target->past!=null)
                <tr>
                    <td class="bg-dark-subtle"><b>前回のプレゼント</b></td>
                    <td>{{ $target->past }}</td>
                </tr>
            @endif
        </tbody>
    </table><br>
    <div class="text-center">
        <a class="btn btn-success w-25" href="/target/edit/{{$target->id}}">編集</a>
            <form action="/targetDelete/{{$target->id}}" method="post">
            @csrf
            <br>
                <div class="form-check">
                    <label><input type="checkbox" class="checkbox" name="checkDelete" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                    <label class="form-check-label" for="invalidCheck3"> この人を削除します</label>
                </div>
                    <button type="submit" class="btn btn-danger w-25">削除</button>
            </form>
    </div>
</div>
@stop
