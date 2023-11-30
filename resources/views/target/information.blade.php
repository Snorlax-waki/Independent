@extends('adminlte::page')

@section('title', '贈る人一覧')

@section('content_header')
    <h1>{{ $target->name }} さんのキー<img src="/img/key.png"></h1>
@stop

<style>
    .img{
        border-radius: 50%;
    }

    .table-info{
        width: 20%;
    }

    .table-30{
        width: 20%;
    }


</style>
@section('content')

<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white">

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/target/index">>>一覧画面へ戻る</a>
</div>
    
      <div class="d-flex flex-row">
        @if($target->image!=null)
            <div class="image p-2">
                <img src="data:image/jpg;base64,{{ $target->image }}" class="img">
                @else<img src="/img/noimage.png">
            </div>
        @endif
        <div class="p-2">
        <h4><span class="badge bg-info">名前</span>　{{ $target->name }}</h4>
        <h6><span class="badge bg-secondary">ステータス</span>　{{ config('status.status.'.$target->status) }}</h6>
        <h6><span class="badge bg-secondary">イベント</span>　{{ config('event.event.'.$target->event) }}</h6>
        <h4><span class="badge bg-info">贈る日</span>　{{ $target->xday }}</h4>
        </div>
    <div>
        
    <table class="table table-bordered">
    <tbody>
        @if($target->budget!=null)
            <tr>
                <td class="table-info">予算</td>
                <td>{{ number_format($target->budget) }}円</td>
            </tr>
        @endif
        @if($target->hobby!=null)
            <tr>
                <td class="table-info">趣味</td>
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
                <td class="table-info">好きな色</td>
                <td>@if($target->fav_color == "#ea5550")<img src="/img/red.png">
                    @elseif($target->fav_color == "#00afcc")<img src="/img/blue.png">
                    @elseif($target->fav_color == "#ffff00")<img src="/img/yellow.png">
                    @elseif($target->fav_color == "#00ff00")<img src="/img/green.png">
                    @elseif($target->fav_color == "#eb6ea0")<img src="/img/pink.png">
                    @elseif($target->fav_color == "#ff9328")<img src="/img/orange.png">
                    @elseif($target->fav_color == "#915da3")<img src="/img/purple.png">
                    @elseif($target->fav_color == "#010101")<img src="/img/black.png">
                    @elseif($target->fav_color == "#ffffff")<img src="/img/white.png">
                    @else<font color="{{ $target->fav_color }}" size="6">●</font>@endif
                </td>
            </tr>
        @endif
        @if($target->fav_food_drink!=null)
            <tr>
                <td class="table-info">好きな食べ物・飲み物</td>
                <td>{{ $target->fav_food_drink }}</td>
            </tr>
        @endif
        @if($target->fav_thing!=null)
            <tr>
                <td class="table-info">その他好きなこと・もの</td>
                <td>{{ $target->fav_thing }}</td>
            </tr>
        @endif
        @if($target->memo!=null)
            <tr>
                <td class="table-info">MEMO</td>
                <td>{!! nl2br(htmlspecialchars($target->memo)) !!}</td>
            </tr>
        @endif
        @if($target->idea!=null)
            <tr>
                <td class="table-info">候補①</td>
                <td>○{{ $target->idea }}
                @if($target->url!=null)<div class="auto-link">URL&nbsp;:&nbsp;{!! nl2br($url) !!}</div>@endif
                </td>
            </tr>
        @endif
        @if($target->idea2!=null)
            <tr>
                <td class="table-info">候補②</td>
                <td>○{{ $target->idea2 }}
                @if($target->url2!=null)<div class="auto-link">URL&nbsp;:&nbsp;{!! nl2br($url2) !!}</div>@endif
                </td>
            </tr>
        @endif
        @if($target->idea3!=null)
            <tr>
                <td class="table-info">候補③</td>
                <td>○{{ $target->idea3 }}
                @if($target->url3!=null)<div class="auto-link">URL&nbsp;:&nbsp;{!! nl2br($url3) !!}</div>@endif
                </td>
            </tr>
        @endif
        </tbody>
    </table>
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

@endsection
