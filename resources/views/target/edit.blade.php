@extends('adminlte::page')

@section('content_header')
    <h1>{{ $target->name }}さんの<font size="10">KEY</font>を編集する&nbsp;<img src="/img/アイコン/キー.png" class="key-icon"></h1><br>
    <h6><font color="red">※<span class="badge text-bg-danger">項目</span>は必須</font></h6>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<style>
.w30{
    width: 30%;
    position: relative;
}

.w50{
    width: 50%;
    position: relative;
}

.key-icon{
        width: 100px;
    }

</style>
@stop

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">    
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white shadow">

@if (count($errors) > 0)
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <br><a href="/target/edit">全ての項目をクリアにする</a>
        </div>
@endif

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/target/index">>>一覧画面へ戻る</a>
    </div>

    <form action="/targetEdit" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
        <div class="mb-3 w30">
            <span class="badge text-bg-secondary">写真</span>
                <div class="d-flex flex-row">
                @if($target->image!=null)
                    <div class="p-2 col">
                        <img src="data:image/jpg;base64,{{ $target->image }}">
                        <p style="color:#c82c55"><登録済みの画像></p>
                    </div>
                @endif
                    <div class="p-2">
                        <input class="preview-uploader @if($errors->has('image')) is-invalid @endif" id="image" type="file" name="image">
                        <div class="preview col" style="width:300px"></div>
                    </div>
                </div>
        </div>

    <div class="mb-3 w30">
        <span class="badge text-bg-danger">名前</span><br>
        <input class="form-control @if($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name',$target->name) }}">
    </div>

    <span class="badge text-bg-danger">イベント</span>&emsp;
        <div class="form-check form-check-inline">
            <input class="form-check-input form-check-inline @if($errors->has('event')) is-invalid @endif " type="radio" name="event" id="event1" value="1" {{ old('event',$target->event) == 1 ? 'checked' : '' }}/>
            <label class="form-check-label" for="event1">誕生日</label>
        </div>                        
        <div class="form-check form-check-inline">
            <input class="form-check-input form-check-inline @if($errors->has('event')) is-invalid @endif" type="radio" name="event" id="event2" value="2" {{ old('event',$target->event) == 2 ? 'checked' : '' }}/>
            <label class="form-check-label" for="event2">クリスマス</label>
        </div>                        
        <div class="form-check form-check-inline">
            <input class="form-check-input form-check-inline @if($errors->has('event')) is-invalid @endif" type="radio" name="event" id="event3" value="3" {{ old('event',$target->event) == 3 ? 'checked' : '' }}/>
            <label class="form-check-label" for="event3">母の日</label>
        </div>                        
        <div class="form-check form-check-inline">
            <input class="form-check-input form-check-inline @if($errors->has('event')) is-invalid @endif" type="radio" name="event" id="event4" value="4" {{ old('event',$target->event) == 4 ? 'checked' : '' }}/>
            <label class="form-check-label" for="event4">父の日</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input form-check-inline @if($errors->has('event')) is-invalid @endif" type="radio" name="event" id="event5" value="5" {{ old('event',$target->event) == 5 ? 'checked' : '' }}/>
            <label class="form-check-label" for="event5">敬老の日</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input form-check-inline @if($errors->has('event')) is-invalid @endif" type="radio" name="event" id="event6" value="6" {{ old('event',$target->event) == 6 ? 'checked' : '' }}/>
            <label class="form-check-label" for="event6">その他</label>
        </div>
    <br><br>
    
    <div class="mb-3">
        <span class="badge text-bg-danger">贈る日</span>&emsp;
        <input type="text" name="xday" id="date" value="{{ old('xday',$target->xday) }}" placeholder="&emsp;年&nbsp;/&nbsp;月&nbsp;/&nbsp;日">@if($errors->has('xday'))<font color="red">&nbsp;※&nbsp;日付必須</font>@endif
    </div>

    <span class="badge text-bg-danger">ステータス</span>
        <select class="form-select w30 @if($errors->has('status')) is-invalid @endif" name="status">
            <option disabled selected>選択してください</option>
            <option value="1" @if( old('status',$target->status) == '1' ) selected @endif>考え中…</option>
            <option value="2" @if( old('status',$target->status) == '2' ) selected @endif>決めた!</option>
            <option value="3" @if( old('status',$target->status) == '3' ) selected @endif>購入済</option>
        </select>
        <br>

    <span class="badge text-bg-secondary">予算</span>
        <div class="input-group w30">
            <input type="text" class="form-control @if($errors->has('budget')) is-invalid @endif" name="budget" placeholder="半角数字" value="{{ old('budget',$target->budget) }}">
            <span class="input-group-text">円</span>
        </div><br>

    <span class="badge text-bg-secondary">趣味</span>
        <div class="d-flex flex-row">
            <select class="form-select-sm w-75 p-2 mr-2 @if($errors->has('hobby')) is-invalid @endif" name="hobby">
                <option disabled selected>選択してください</option>
                <option disabled>◯鑑賞系</option>
                <option value="1" @if( old('hobby',$target->hobby) == '1' ) selected @endif>&emsp;音楽</option>
                <option value="2" @if( old('hobby',$target->hobby) == '2' ) selected @endif>&emsp;映画</option>
                <option value="3" @if( old('hobby',$target->hobby) == '3' ) selected @endif>&emsp;ドラマ</option>
                <option value="4" @if( old('hobby',$target->hobby) == '4' ) selected @endif>&emsp;動画</option>
                <option value="5" @if( old('hobby',$target->hobby) == '5' ) selected @endif>&emsp;ラジオ</option>
                <option value="6" @if( old('hobby',$target->hobby) == '6' ) selected @endif>&emsp;お笑い</option>
                <option value="7" @if( old('hobby',$target->hobby) == '7' ) selected @endif>&emsp;舞台</option>
                <option value="8" @if( old('hobby',$target->hobby) == '8' ) selected @endif>&emsp;コンサート/ライブ</option>
                <option value="9" @if( old('hobby',$target->hobby) == '9' ) selected @endif>&emsp;読書</option>
                <option value="10" @if( old('hobby',$target->hobby) == '10' ) selected @endif>&emsp;漫画</option>
                <option value="11" @if( old('hobby',$target->hobby) == '11' ) selected @endif>&emsp;アニメ</option>
                <option disabled>◯アクティブ系</option>
                <option value="12" @if( old('hobby',$target->hobby) == '12' ) selected @endif>&emsp;絵を描く</option>
                <option value="13" @if( old('hobby',$target->hobby) == '13' ) selected @endif>&emsp;作曲</option>
                <option value="14" @if( old('hobby',$target->hobby) == '14' ) selected @endif>&emsp;楽器演奏</option>
                <option value="15" @if( old('hobby',$target->hobby) == '15' ) selected @endif>&emsp;カメラ/写真</option>
                <option value="16" @if( old('hobby',$target->hobby) == '16' ) selected @endif>&emsp;動画制作</option>
                <option value="17" @if( old('hobby',$target->hobby) == '17' ) selected @endif>&emsp;料理</option>
                <option value="18" @if( old('hobby',$target->hobby) == '18' ) selected @endif>&emsp;お菓子作り</option>
                <option value="19" @if( old('hobby',$target->hobby) == '19' ) selected @endif>&emsp;裁縫</option>
                <option value="20" @if( old('hobby',$target->hobby) == '20' ) selected @endif>&emsp;ショッピング</option>
                <option value="21" @if( old('hobby',$target->hobby) == '21' ) selected @endif>&emsp;カラオケ</option>
                <option value="22" @if( old('hobby',$target->hobby) == '22' ) selected @endif>&emsp;歌唱</option>
                <option value="23" @if( old('hobby',$target->hobby) == '23' ) selected @endif>&emsp;ダンス</option>
                <option value="24" @if( old('hobby',$target->hobby) == '24' ) selected @endif>&emsp;カフェ巡り</option>
                <option value="25" @if( old('hobby',$target->hobby) == '25' ) selected @endif>&emsp;食べ歩き</option>
                <option disabled>◯アウトドア系</option>
                <option value="26" @if( old('hobby',$target->hobby) == '26' ) selected @endif>&emsp;旅行</option>
                <option value="27" @if( old('hobby',$target->hobby) == '27' ) selected @endif>&emsp;車</option>
                <option value="28" @if( old('hobby',$target->hobby) == '28' ) selected @endif>&emsp;バイク</option>
                <option value="29" @if( old('hobby',$target->hobby) == '29' ) selected @endif>&emsp;釣り</option>
                <option value="30" @if( old('hobby',$target->hobby) == '30' ) selected @endif>&emsp;ウォーキング</option>
                <option value="31" @if( old('hobby',$target->hobby) == '31' ) selected @endif>&emsp;サイクリング</option>
                <option disabled>◯スポーツ/観戦系</option>
                <option value="32" @if( old('hobby',$target->hobby) == '32' ) selected @endif>&emsp;野球</option>
                <option value="33" @if( old('hobby',$target->hobby) == '33' ) selected @endif>&emsp;サッカー</option>
                <option value="34" @if( old('hobby',$target->hobby) == '34' ) selected @endif>&emsp;バスケットボール</option>
                <option value="35" @if( old('hobby',$target->hobby) == '35' ) selected @endif>&emsp;ラグビー</option>
                <option value="36" @if( old('hobby',$target->hobby) == '36' ) selected @endif>&emsp;バレーボール</option>
                <option value="37" @if( old('hobby',$target->hobby) == '37' ) selected @endif>&emsp;卓球</option>
                <option value="38" @if( old('hobby',$target->hobby) == '38' ) selected @endif>&emsp;テニス</option>
                <option value="39" @if( old('hobby',$target->hobby) == '39' ) selected @endif>&emsp;大相撲</option>
                <option value="40" @if( old('hobby',$target->hobby) == '40' ) selected @endif>&emsp;格闘技</option>
                <option value="41" @if( old('hobby',$target->hobby) == '41' ) selected @endif>&emsp;フィギュアスケート</option>
                <option value="42" @if( old('hobby',$target->hobby) == '42' ) selected @endif>&emsp;モータースポーツ</option>
                <option disabled>◯娯楽系</option>
                <option value="43" @if( old('hobby',$target->hobby) == '43' ) selected @endif>&emsp;ゲーム</option>
                <option value="44" @if( old('hobby',$target->hobby) == '44' ) selected @endif>&emsp;カードゲーム</option>
                <option value="45" @if( old('hobby',$target->hobby) == '45' ) selected @endif>&emsp;競馬</option>
                <option value="46" @if( old('hobby',$target->hobby) == '46' ) selected @endif>&emsp;パチンコ</option>
                <option disabled>◯収集系</option>
                <option value="47" @if( old('hobby',$target->hobby) == '47' ) selected @endif>&emsp;プラモデル</option>
                <option value="48" @if( old('hobby',$target->hobby) == '48' ) selected @endif>&emsp;フィギュア</option>
                <option value="49" @if( old('hobby',$target->hobby) == '49' ) selected @endif>&emsp;ガチャガチャ</option>
                <option value="50" @if( old('hobby',$target->hobby) == '50' ) selected @endif>&emsp;ぬいぐるみ</option>
                <option disabled>◯その他</option>
                <option value="51" @if( old('hobby',$target->hobby) == '51' ) selected @endif>&emsp;ファッション</option>
                <option value="52" @if( old('hobby',$target->hobby) == '52' ) selected @endif>&emsp;化粧</option>
                <option value="53" @if( old('hobby',$target->hobby) == '53' ) selected @endif>&emsp;コスプレ</option>
            </select>
            <select class="form-select-sm w-75 p-2 mr-2 @if($errors->has('hobby2')) is-invalid @endif" name="hobby2">
                <option disabled selected>選択してください</option>
                <option disabled>◯鑑賞系</option>
                <option value="1" @if( old('hobby2',$target->hobby2) == '1' ) selected @endif>&emsp;音楽</option>
                <option value="2" @if( old('hobby2',$target->hobby2) == '2' ) selected @endif>&emsp;映画</option>
                <option value="3" @if( old('hobby2',$target->hobby2) == '3' ) selected @endif>&emsp;ドラマ</option>
                <option value="4" @if( old('hobby2',$target->hobby2) == '4' ) selected @endif>&emsp;動画</option>
                <option value="5" @if( old('hobby2',$target->hobby2) == '5' ) selected @endif>&emsp;ラジオ</option>
                <option value="6" @if( old('hobby2',$target->hobby2) == '6' ) selected @endif>&emsp;お笑い</option>
                <option value="7" @if( old('hobby2',$target->hobby2) == '7' ) selected @endif>&emsp;舞台</option>
                <option value="8" @if( old('hobby2',$target->hobby2) == '8' ) selected @endif>&emsp;コンサート/ライブ</option>
                <option value="9" @if( old('hobby2',$target->hobby2) == '9' ) selected @endif>&emsp;読書</option>
                <option value="10" @if( old('hobby2',$target->hobby2) == '10' ) selected @endif>&emsp;漫画</option>
                <option value="11" @if( old('hobby2',$target->hobby2) == '11' ) selected @endif>&emsp;アニメ</option>
                <option disabled>◯アクティブ系</option>
                <option value="12" @if( old('hobby2',$target->hobby2) == '12' ) selected @endif>&emsp;絵を描く</option>
                <option value="13" @if( old('hobby2',$target->hobby2) == '13' ) selected @endif>&emsp;作曲</option>
                <option value="14" @if( old('hobby2',$target->hobby2) == '14' ) selected @endif>&emsp;楽器演奏</option>
                <option value="15" @if( old('hobby2',$target->hobby2) == '15' ) selected @endif>&emsp;カメラ/写真</option>
                <option value="16" @if( old('hobby2',$target->hobby2) == '16' ) selected @endif>&emsp;動画制作</option>
                <option value="17" @if( old('hobby2',$target->hobby2) == '17' ) selected @endif>&emsp;料理</option>
                <option value="18" @if( old('hobby2',$target->hobby2) == '18' ) selected @endif>&emsp;お菓子作り</option>
                <option value="19" @if( old('hobby2',$target->hobby2) == '19' ) selected @endif>&emsp;裁縫</option>
                <option value="20" @if( old('hobby2',$target->hobby2) == '20' ) selected @endif>&emsp;ショッピング</option>
                <option value="21" @if( old('hobby2',$target->hobby2) == '21' ) selected @endif>&emsp;カラオケ</option>
                <option value="22" @if( old('hobby2',$target->hobby2) == '22' ) selected @endif>&emsp;歌唱</option>
                <option value="23" @if( old('hobby2',$target->hobby2) == '23' ) selected @endif>&emsp;ダンス</option>
                <option value="24" @if( old('hobby2',$target->hobby2) == '24' ) selected @endif>&emsp;カフェ巡り</option>
                <option value="25" @if( old('hobby2',$target->hobby2) == '25' ) selected @endif>&emsp;食べ歩き</option>
                <option disabled>◯アウトドア系</option>
                <option value="26" @if( old('hobby2',$target->hobby2) == '26' ) selected @endif>&emsp;旅行</option>
                <option value="27" @if( old('hobby2',$target->hobby2) == '27' ) selected @endif>&emsp;車</option>
                <option value="28" @if( old('hobby2',$target->hobby2) == '28' ) selected @endif>&emsp;バイク</option>
                <option value="29" @if( old('hobby2',$target->hobby2) == '29' ) selected @endif>&emsp;釣り</option>
                <option value="30" @if( old('hobby2',$target->hobby2) == '30' ) selected @endif>&emsp;ウォーキング</option>
                <option value="31" @if( old('hobby2',$target->hobby2) == '31' ) selected @endif>&emsp;サイクリング</option>
                <option disabled>◯スポーツ/観戦系</option>
                <option value="32" @if( old('hobby2',$target->hobby2) == '32' ) selected @endif>&emsp;野球</option>
                <option value="33" @if( old('hobby2',$target->hobby2) == '33' ) selected @endif>&emsp;サッカー</option>
                <option value="34" @if( old('hobby2',$target->hobby2) == '34' ) selected @endif>&emsp;バスケットボール</option>
                <option value="35" @if( old('hobby2',$target->hobby2) == '35' ) selected @endif>&emsp;ラグビー</option>
                <option value="36" @if( old('hobby2',$target->hobby2) == '36' ) selected @endif>&emsp;バレーボール</option>
                <option value="37" @if( old('hobby2',$target->hobby2) == '37' ) selected @endif>&emsp;卓球</option>
                <option value="38" @if( old('hobby2',$target->hobby2) == '38' ) selected @endif>&emsp;テニス</option>
                <option value="39" @if( old('hobby2',$target->hobby2) == '39' ) selected @endif>&emsp;大相撲</option>
                <option value="40" @if( old('hobby2',$target->hobby2) == '40' ) selected @endif>&emsp;格闘技</option>
                <option value="41" @if( old('hobby2',$target->hobby2) == '41' ) selected @endif>&emsp;フィギュアスケート</option>
                <option value="42" @if( old('hobby2',$target->hobby2) == '42' ) selected @endif>&emsp;モータースポーツ</option>
                <option disabled>◯娯楽系</option>
                <option value="43" @if( old('hobby2',$target->hobby2) == '43' ) selected @endif>&emsp;ゲーム</option>
                <option value="44" @if( old('hobby2',$target->hobby2) == '44' ) selected @endif>&emsp;カードゲーム</option>
                <option value="45" @if( old('hobby2',$target->hobby2) == '45' ) selected @endif>&emsp;競馬</option>
                <option value="46" @if( old('hobby2',$target->hobby2) == '46' ) selected @endif>&emsp;パチンコ</option>
                <option disabled>◯収集系</option>
                <option value="47" @if( old('hobby2',$target->hobby2) == '47' ) selected @endif>&emsp;プラモデル</option>
                <option value="48" @if( old('hobby2',$target->hobby2) == '48' ) selected @endif>&emsp;フィギュア</option>
                <option value="49" @if( old('hobby2',$target->hobby2) == '49' ) selected @endif>&emsp;ガチャガチャ</option>
                <option value="50" @if( old('hobby2',$target->hobby2) == '50' ) selected @endif>&emsp;ぬいぐるみ</option>
                <option disabled>◯その他</option>
                <option value="51" @if( old('hobby2',$target->hobby2) == '51' ) selected @endif>&emsp;ファッション</option>
                <option value="52" @if( old('hobby2',$target->hobby2) == '52' ) selected @endif>&emsp;化粧</option>
                <option value="53" @if( old('hobby2',$target->hobby2) == '53' ) selected @endif>&emsp;コスプレ</option>
            </select>
            <select class="form-select-sm w-75 p-2 mr-2 @if($errors->has('hobby3')) is-invalid @endif" name="hobby3">
                <option disabled selected>選択してください</option>
                <option disabled>◯鑑賞系</option>
                <option value="1" @if( old('hobby3',$target->hobby3) == '1' ) selected @endif>&emsp;音楽</option>
                <option value="2" @if( old('hobby3',$target->hobby3) == '2' ) selected @endif>&emsp;映画</option>
                <option value="3" @if( old('hobby3',$target->hobby3) == '3' ) selected @endif>&emsp;ドラマ</option>
                <option value="4" @if( old('hobby3',$target->hobby3) == '4' ) selected @endif>&emsp;動画</option>
                <option value="5" @if( old('hobby3',$target->hobby3) == '5' ) selected @endif>&emsp;ラジオ</option>
                <option value="6" @if( old('hobby3',$target->hobby3) == '6' ) selected @endif>&emsp;お笑い</option>
                <option value="7" @if( old('hobby3',$target->hobby3) == '7' ) selected @endif>&emsp;舞台</option>
                <option value="8" @if( old('hobby3',$target->hobby3) == '8' ) selected @endif>&emsp;コンサート/ライブ</option>
                <option value="9" @if( old('hobby3',$target->hobby3) == '9' ) selected @endif>&emsp;読書</option>
                <option value="10" @if( old('hobby3',$target->hobby3) == '10' ) selected @endif>&emsp;漫画</option>
                <option value="11" @if( old('hobby3',$target->hobby3) == '11' ) selected @endif>&emsp;アニメ</option>
                <option disabled>◯アクティブ系</option>
                <option value="12" @if( old('hobby3',$target->hobby3) == '12' ) selected @endif>&emsp;絵を描く</option>
                <option value="13" @if( old('hobby3',$target->hobby3) == '13' ) selected @endif>&emsp;作曲</option>
                <option value="14" @if( old('hobby3',$target->hobby3) == '14' ) selected @endif>&emsp;楽器演奏</option>
                <option value="15" @if( old('hobby3',$target->hobby3) == '15' ) selected @endif>&emsp;カメラ/写真</option>
                <option value="16" @if( old('hobby3',$target->hobby3) == '16' ) selected @endif>&emsp;動画制作</option>
                <option value="17" @if( old('hobby3',$target->hobby3) == '17' ) selected @endif>&emsp;料理</option>
                <option value="18" @if( old('hobby3',$target->hobby3) == '18' ) selected @endif>&emsp;お菓子作り</option>
                <option value="19" @if( old('hobby3',$target->hobby3) == '19' ) selected @endif>&emsp;裁縫</option>
                <option value="20" @if( old('hobby3',$target->hobby3) == '20' ) selected @endif>&emsp;ショッピング</option>
                <option value="21" @if( old('hobby3',$target->hobby3) == '21' ) selected @endif>&emsp;カラオケ</option>
                <option value="22" @if( old('hobby3',$target->hobby3) == '22' ) selected @endif>&emsp;歌唱</option>
                <option value="23" @if( old('hobby3',$target->hobby3) == '23' ) selected @endif>&emsp;ダンス</option>
                <option value="24" @if( old('hobby3',$target->hobby3) == '24' ) selected @endif>&emsp;カフェ巡り</option>
                <option value="25" @if( old('hobby3',$target->hobby3) == '25' ) selected @endif>&emsp;食べ歩き</option>
                <option disabled>◯アウトドア系</option>
                <option value="26" @if( old('hobby3',$target->hobby3) == '26' ) selected @endif>&emsp;旅行</option>
                <option value="27" @if( old('hobby3',$target->hobby3) == '27' ) selected @endif>&emsp;車</option>
                <option value="28" @if( old('hobby3',$target->hobby3) == '28' ) selected @endif>&emsp;バイク</option>
                <option value="29" @if( old('hobby3',$target->hobby3) == '29' ) selected @endif>&emsp;釣り</option>
                <option value="30" @if( old('hobby3',$target->hobby3) == '30' ) selected @endif>&emsp;ウォーキング</option>
                <option value="31" @if( old('hobby3',$target->hobby3) == '31' ) selected @endif>&emsp;サイクリング</option>
                <option disabled>◯スポーツ/観戦系</option>
                <option value="32" @if( old('hobby3',$target->hobby3) == '32' ) selected @endif>&emsp;野球</option>
                <option value="33" @if( old('hobby3',$target->hobby3) == '33' ) selected @endif>&emsp;サッカー</option>
                <option value="34" @if( old('hobby3',$target->hobby3) == '34' ) selected @endif>&emsp;バスケットボール</option>
                <option value="35" @if( old('hobby3',$target->hobby3) == '35' ) selected @endif>&emsp;ラグビー</option>
                <option value="36" @if( old('hobby3',$target->hobby3) == '36' ) selected @endif>&emsp;バレーボール</option>
                <option value="37" @if( old('hobby3',$target->hobby3) == '37' ) selected @endif>&emsp;卓球</option>
                <option value="38" @if( old('hobby3',$target->hobby3) == '38' ) selected @endif>&emsp;テニス</option>
                <option value="39" @if( old('hobby3',$target->hobby3) == '39' ) selected @endif>&emsp;大相撲</option>
                <option value="40" @if( old('hobby3',$target->hobby3) == '40' ) selected @endif>&emsp;格闘技</option>
                <option value="41" @if( old('hobby3',$target->hobby3) == '41' ) selected @endif>&emsp;フィギュアスケート</option>
                <option value="42" @if( old('hobby3',$target->hobby3) == '42' ) selected @endif>&emsp;モータースポーツ</option>
                <option disabled>◯娯楽系</option>
                <option value="43" @if( old('hobby3',$target->hobby3) == '43' ) selected @endif>&emsp;ゲーム</option>
                <option value="44" @if( old('hobby3',$target->hobby3) == '44' ) selected @endif>&emsp;カードゲーム</option>
                <option value="45" @if( old('hobby3',$target->hobby3) == '45' ) selected @endif>&emsp;競馬</option>
                <option value="46" @if( old('hobby3',$target->hobby3) == '46' ) selected @endif>&emsp;パチンコ</option>
                <option disabled>◯収集系</option>
                <option value="47" @if( old('hobby3',$target->hobby3) == '47' ) selected @endif>&emsp;プラモデル</option>
                <option value="48" @if( old('hobby3',$target->hobby3) == '48' ) selected @endif>&emsp;フィギュア</option>
                <option value="49" @if( old('hobby3',$target->hobby3) == '49' ) selected @endif>&emsp;ガチャガチャ</option>
                <option value="50" @if( old('hobby3',$target->hobby3) == '50' ) selected @endif>&emsp;ぬいぐるみ</option>
                <option disabled>◯その他</option>
                <option value="51" @if( old('hobby3',$target->hobby3) == '51' ) selected @endif>&emsp;ファッション</option>
                <option value="52" @if( old('hobby3',$target->hobby3) == '52' ) selected @endif>&emsp;化粧</option>
                <option value="53" @if( old('hobby3',$target->hobby3) == '53' ) selected @endif>&emsp;コスプレ</option>
            </select>
            <select class="form-select-sm w-75 p-2 mr-2 @if($errors->has('hobby4')) is-invalid @endif" name="hobby4">
                <option disabled selected>選択してください</option>
                <option disabled>◯鑑賞系</option>
                <option value="1" @if( old('hobby4',$target->hobby4) == '1' ) selected @endif>&emsp;音楽</option>
                <option value="2" @if( old('hobby4',$target->hobby4) == '2' ) selected @endif>&emsp;映画</option>
                <option value="3" @if( old('hobby4',$target->hobby4) == '3' ) selected @endif>&emsp;ドラマ</option>
                <option value="4" @if( old('hobby4',$target->hobby4) == '4' ) selected @endif>&emsp;動画</option>
                <option value="5" @if( old('hobby4',$target->hobby4) == '5' ) selected @endif>&emsp;ラジオ</option>
                <option value="6" @if( old('hobby4',$target->hobby4) == '6' ) selected @endif>&emsp;お笑い</option>
                <option value="7" @if( old('hobby4',$target->hobby4) == '7' ) selected @endif>&emsp;舞台</option>
                <option value="8" @if( old('hobby4',$target->hobby4) == '8' ) selected @endif>&emsp;コンサート/ライブ</option>
                <option value="9" @if( old('hobby4',$target->hobby4) == '9' ) selected @endif>&emsp;読書</option>
                <option value="10" @if( old('hobby4',$target->hobby4) == '10' ) selected @endif>&emsp;漫画</option>
                <option value="11" @if( old('hobby4',$target->hobby4) == '11' ) selected @endif>&emsp;アニメ</option>
                <option disabled>◯アクティブ系</option>
                <option value="12" @if( old('hobby4',$target->hobby4) == '12' ) selected @endif>&emsp;絵を描く</option>
                <option value="13" @if( old('hobby4',$target->hobby4) == '13' ) selected @endif>&emsp;作曲</option>
                <option value="14" @if( old('hobby4',$target->hobby4) == '14' ) selected @endif>&emsp;楽器演奏</option>
                <option value="15" @if( old('hobby4',$target->hobby4) == '15' ) selected @endif>&emsp;カメラ/写真</option>
                <option value="16" @if( old('hobby4',$target->hobby4) == '16' ) selected @endif>&emsp;動画制作</option>
                <option value="17" @if( old('hobby4',$target->hobby4) == '17' ) selected @endif>&emsp;料理</option>
                <option value="18" @if( old('hobby4',$target->hobby4) == '18' ) selected @endif>&emsp;お菓子作り</option>
                <option value="19" @if( old('hobby4',$target->hobby4) == '19' ) selected @endif>&emsp;裁縫</option>
                <option value="20" @if( old('hobby4',$target->hobby4) == '20' ) selected @endif>&emsp;ショッピング</option>
                <option value="21" @if( old('hobby4',$target->hobby4) == '21' ) selected @endif>&emsp;カラオケ</option>
                <option value="22" @if( old('hobby4',$target->hobby4) == '22' ) selected @endif>&emsp;歌唱</option>
                <option value="23" @if( old('hobby4',$target->hobby4) == '23' ) selected @endif>&emsp;ダンス</option>
                <option value="24" @if( old('hobby4',$target->hobby4) == '24' ) selected @endif>&emsp;カフェ巡り</option>
                <option value="25" @if( old('hobby4',$target->hobby4) == '25' ) selected @endif>&emsp;食べ歩き</option>
                <option disabled>◯アウトドア系</option>
                <option value="26" @if( old('hobby4',$target->hobby4) == '26' ) selected @endif>&emsp;旅行</option>
                <option value="27" @if( old('hobby4',$target->hobby4) == '27' ) selected @endif>&emsp;車</option>
                <option value="28" @if( old('hobby4',$target->hobby4) == '28' ) selected @endif>&emsp;バイク</option>
                <option value="29" @if( old('hobby4',$target->hobby4) == '29' ) selected @endif>&emsp;釣り</option>
                <option value="30" @if( old('hobby4',$target->hobby4) == '30' ) selected @endif>&emsp;ウォーキング</option>
                <option value="31" @if( old('hobby4',$target->hobby4) == '31' ) selected @endif>&emsp;サイクリング</option>
                <option disabled>◯スポーツ/観戦系</option>
                <option value="32" @if( old('hobby4',$target->hobby4) == '32' ) selected @endif>&emsp;野球</option>
                <option value="33" @if( old('hobby4',$target->hobby4) == '33' ) selected @endif>&emsp;サッカー</option>
                <option value="34" @if( old('hobby4',$target->hobby4) == '34' ) selected @endif>&emsp;バスケットボール</option>
                <option value="35" @if( old('hobby4',$target->hobby4) == '35' ) selected @endif>&emsp;ラグビー</option>
                <option value="36" @if( old('hobby4',$target->hobby4) == '36' ) selected @endif>&emsp;バレーボール</option>
                <option value="37" @if( old('hobby4',$target->hobby4) == '37' ) selected @endif>&emsp;卓球</option>
                <option value="38" @if( old('hobby4',$target->hobby4) == '38' ) selected @endif>&emsp;テニス</option>
                <option value="39" @if( old('hobby4',$target->hobby4) == '39' ) selected @endif>&emsp;大相撲</option>
                <option value="40" @if( old('hobby4',$target->hobby4) == '40' ) selected @endif>&emsp;格闘技</option>
                <option value="41" @if( old('hobby4',$target->hobby4) == '41' ) selected @endif>&emsp;フィギュアスケート</option>
                <option value="42" @if( old('hobby4',$target->hobby4) == '42' ) selected @endif>&emsp;モータースポーツ</option>
                <option disabled>◯娯楽系</option>
                <option value="43" @if( old('hobby4',$target->hobby4) == '43' ) selected @endif>&emsp;ゲーム</option>
                <option value="44" @if( old('hobby4',$target->hobby4) == '44' ) selected @endif>&emsp;カードゲーム</option>
                <option value="45" @if( old('hobby4',$target->hobby4) == '45' ) selected @endif>&emsp;競馬</option>
                <option value="46" @if( old('hobby4',$target->hobby4) == '46' ) selected @endif>&emsp;パチンコ</option>
                <option disabled>◯収集系</option>
                <option value="47" @if( old('hobby4',$target->hobby4) == '47' ) selected @endif>&emsp;プラモデル</option>
                <option value="48" @if( old('hobby4',$target->hobby4) == '48' ) selected @endif>&emsp;フィギュア</option>
                <option value="49" @if( old('hobby4',$target->hobby4) == '49' ) selected @endif>&emsp;ガチャガチャ</option>
                <option value="50" @if( old('hobby4',$target->hobby4) == '50' ) selected @endif>&emsp;ぬいぐるみ</option>
                <option disabled>◯その他</option>
                <option value="51" @if( old('hobby4',$target->hobby4) == '51' ) selected @endif>&emsp;ファッション</option>
                <option value="52" @if( old('hobby4',$target->hobby4) == '52' ) selected @endif>&emsp;化粧</option>
                <option value="53" @if( old('hobby4',$target->hobby4) == '53' ) selected @endif>&emsp;コスプレ</option>
            </select>
            <select class="form-select-sm w-75 p-2 mr-2 @if($errors->has('hobby5')) is-invalid @endif" name="hobby5">
                <option disabled selected>選択してください</option>
                <option disabled>◯鑑賞系</option>
                <option value="1" @if( old('hobby5',$target->hobby5) == '1' ) selected @endif>&emsp;音楽</option>
                <option value="2" @if( old('hobby5',$target->hobby5) == '2' ) selected @endif>&emsp;映画</option>
                <option value="3" @if( old('hobby5',$target->hobby5) == '3' ) selected @endif>&emsp;ドラマ</option>
                <option value="4" @if( old('hobby5',$target->hobby5) == '4' ) selected @endif>&emsp;動画</option>
                <option value="5" @if( old('hobby5',$target->hobby5) == '5' ) selected @endif>&emsp;ラジオ</option>
                <option value="6" @if( old('hobby5',$target->hobby5) == '6' ) selected @endif>&emsp;お笑い</option>
                <option value="7" @if( old('hobby5',$target->hobby5) == '7' ) selected @endif>&emsp;舞台</option>
                <option value="8" @if( old('hobby5',$target->hobby5) == '8' ) selected @endif>&emsp;コンサート/ライブ</option>
                <option value="9" @if( old('hobby5',$target->hobby5) == '9' ) selected @endif>&emsp;読書</option>
                <option value="10" @if( old('hobby5',$target->hobby5) == '10' ) selected @endif>&emsp;漫画</option>
                <option value="11" @if( old('hobby5',$target->hobby5) == '11' ) selected @endif>&emsp;アニメ</option>
                <option disabled>◯アクティブ系</option>
                <option value="12" @if( old('hobby5',$target->hobby5) == '12' ) selected @endif>&emsp;絵を描く</option>
                <option value="13" @if( old('hobby5',$target->hobby5) == '13' ) selected @endif>&emsp;作曲</option>
                <option value="14" @if( old('hobby5',$target->hobby5) == '14' ) selected @endif>&emsp;楽器演奏</option>
                <option value="15" @if( old('hobby5',$target->hobby5) == '15' ) selected @endif>&emsp;カメラ/写真</option>
                <option value="16" @if( old('hobby5',$target->hobby5) == '16' ) selected @endif>&emsp;動画制作</option>
                <option value="17" @if( old('hobby5',$target->hobby5) == '17' ) selected @endif>&emsp;料理</option>
                <option value="18" @if( old('hobby5',$target->hobby5) == '18' ) selected @endif>&emsp;お菓子作り</option>
                <option value="19" @if( old('hobby5',$target->hobby5) == '19' ) selected @endif>&emsp;裁縫</option>
                <option value="20" @if( old('hobby5',$target->hobby5) == '20' ) selected @endif>&emsp;ショッピング</option>
                <option value="21" @if( old('hobby5',$target->hobby5) == '21' ) selected @endif>&emsp;カラオケ</option>
                <option value="22" @if( old('hobby5',$target->hobby5) == '22' ) selected @endif>&emsp;歌唱</option>
                <option value="23" @if( old('hobby5',$target->hobby5) == '23' ) selected @endif>&emsp;ダンス</option>
                <option value="24" @if( old('hobby5',$target->hobby5) == '24' ) selected @endif>&emsp;カフェ巡り</option>
                <option value="25" @if( old('hobby5',$target->hobby5) == '25' ) selected @endif>&emsp;食べ歩き</option>
                <option disabled>◯アウトドア系</option>
                <option value="26" @if( old('hobby5',$target->hobby5) == '26' ) selected @endif>&emsp;旅行</option>
                <option value="27" @if( old('hobby5',$target->hobby5) == '27' ) selected @endif>&emsp;車</option>
                <option value="28" @if( old('hobby5',$target->hobby5) == '28' ) selected @endif>&emsp;バイク</option>
                <option value="29" @if( old('hobby5',$target->hobby5) == '29' ) selected @endif>&emsp;釣り</option>
                <option value="30" @if( old('hobby5',$target->hobby5) == '30' ) selected @endif>&emsp;ウォーキング</option>
                <option value="31" @if( old('hobby5',$target->hobby5) == '31' ) selected @endif>&emsp;サイクリング</option>
                <option disabled>◯スポーツ/観戦系</option>
                <option value="32" @if( old('hobby5',$target->hobby5) == '32' ) selected @endif>&emsp;野球</option>
                <option value="33" @if( old('hobby5',$target->hobby5) == '33' ) selected @endif>&emsp;サッカー</option>
                <option value="34" @if( old('hobby5',$target->hobby5) == '34' ) selected @endif>&emsp;バスケットボール</option>
                <option value="35" @if( old('hobby5',$target->hobby5) == '35' ) selected @endif>&emsp;ラグビー</option>
                <option value="36" @if( old('hobby5',$target->hobby5) == '36' ) selected @endif>&emsp;バレーボール</option>
                <option value="37" @if( old('hobby5',$target->hobby5) == '37' ) selected @endif>&emsp;卓球</option>
                <option value="38" @if( old('hobby5',$target->hobby5) == '38' ) selected @endif>&emsp;テニス</option>
                <option value="39" @if( old('hobby5',$target->hobby5) == '39' ) selected @endif>&emsp;大相撲</option>
                <option value="40" @if( old('hobby5',$target->hobby5) == '40' ) selected @endif>&emsp;格闘技</option>
                <option value="41" @if( old('hobby5',$target->hobby5) == '41' ) selected @endif>&emsp;フィギュアスケート</option>
                <option value="42" @if( old('hobby5',$target->hobby5) == '42' ) selected @endif>&emsp;モータースポーツ</option>
                <option disabled>◯娯楽系</option>
                <option value="43" @if( old('hobby5',$target->hobby5) == '43' ) selected @endif>&emsp;ゲーム</option>
                <option value="44" @if( old('hobby5',$target->hobby5) == '44' ) selected @endif>&emsp;カードゲーム</option>
                <option value="45" @if( old('hobby5',$target->hobby5) == '45' ) selected @endif>&emsp;競馬</option>
                <option value="46" @if( old('hobby5',$target->hobby5) == '46' ) selected @endif>&emsp;パチンコ</option>
                <option disabled>◯収集系</option>
                <option value="47" @if( old('hobby5',$target->hobby5) == '47' ) selected @endif>&emsp;プラモデル</option>
                <option value="48" @if( old('hobby5',$target->hobby5) == '48' ) selected @endif>&emsp;フィギュア</option>
                <option value="49" @if( old('hobby5',$target->hobby5) == '49' ) selected @endif>&emsp;ガチャガチャ</option>
                <option value="50" @if( old('hobby5',$target->hobby5) == '50' ) selected @endif>&emsp;ぬいぐるみ</option>
                <option disabled>◯その他</option>
                <option value="51" @if( old('hobby5',$target->hobby5) == '51' ) selected @endif>&emsp;ファッション</option>
                <option value="52" @if( old('hobby5',$target->hobby5) == '52' ) selected @endif>&emsp;化粧</option>
                <option value="53" @if( old('hobby5',$target->hobby5) == '53' ) selected @endif>&emsp;コスプレ</option>
            </select>
            <div class="mb-3 w-100">
                <input class="form-control @if($errors->has('hobby_other')) is-invalid @endif" name="hobby_other" value="{{ old('hobby_other',$target->hobby_other) }}" placeholder="その他">
            </div>
        </div><br>

    <span class="badge text-bg-secondary">好きな色</span>&emsp;
        <input type="color" name="fav_color" list="data1" value="{{ old('fav_color',$target->fav_color) }}">
            <datalist id="data1">
                <option value="#ea5550"></option>
                <option value="#00afcc"></option>
                <option value="#ffff00"></option>
                <option value="#00ff00"></option>
                <option value="#eb6ea0"></option>
                <option value="#ff9328"></option>
                <option value="#915da3"></option>
                <option value="#000000"></option>
                <option value="#ffffff"></option>
            </datalist><br><br>

        <div class="mb-3 w50">
            <span class="badge text-bg-secondary">好きな食べ物・飲み物</span>&emsp;
            <input class="form-control @if($errors->has('fav_food_drink')) is-invalid @endif" name="fav_food_drink" value="{{ old('fav_food_drink',$target->fav_food_drink) }}" placeholder="例) 甘いもの・ワイン">
        </div>

        <div class="mb-3 w50">
            <span class="badge text-bg-secondary">その他好きなこと・もの</span>&emsp;
            <input class="form-control @if($errors->has('fav_thing')) is-invalid @endif" name="fav_thing" value="{{ old('fav_thing',$target->fav_thing) }}" placeholder="例) ○○というバンドが好き">
        </div>

        <div class="mb-3">
        <span class="badge text-bg-secondary">MEMO</span>&emsp;
            <textarea class="form-control @if($errors->has('memo')) is-invalid @endif" name="memo" rows="5">{{ old('memo',$target->memo) }}</textarea>
        </div>

    <span class="badge text-bg-secondary">プレゼント候補</span>
        <div class="d-flex flex-row">
            <div class="col input-group">
                <span class="input-group-text">候補①</span>
                <input type="text" class="form-control @if($errors->has('idea')) is-invalid @endif" value="{{ old('idea',$target->idea) }}" placeholder="商品名" name="idea">
            </div>
        <p>:</p>
            <div class="col input-group">
                <span class="input-group-text">候補①URL</span>
                <input type="text" class="form-control @if($errors->has('url')) is-invalid @endif" value="{{ old('url',$target->url) }}" placeholder="商品URL" name="url">
            </div>
        </div><br>
        <div class="d-flex flex-row">
            <div class="col input-group">
                <span class="input-group-text">候補②</span>
                <input type="text" class="form-control @if($errors->has('idea2')) is-invalid @endif" value="{{ old('idea2',$target->idea2) }}" placeholder="商品名" name="idea2">
            </div>
        <p>:</p>
            <div class="col input-group">
                <span class="input-group-text">候補②URL</span>
                <input type="text" class="form-control @if($errors->has('url2')) is-invalid @endif" value="{{ old('url2',$target->url2) }}" placeholder="商品URL" name="url2">
            </div>
        </div><br>
        <div class="d-flex flex-row">
            <div class="col input-group">
                <span class="input-group-text">候補③</span>
                <input type="text" class="form-control @if($errors->has('idea3')) is-invalid @endif" value="{{ old('idea3',$target->idea3) }}" placeholder="商品名" name="idea3">
            </div>
        <p>:</p>
            <div class="col input-group">
                <span class="input-group-text">候補③URL</span>
                <input type="text" class="form-control @if($errors->has('url3')) is-invalid @endif" value="{{ old('url3',$target->url3) }}" placeholder="商品URL" name="url3">
            </div>
        </div><br>

        <input type="hidden" name="id" value="{{$target->id}}">

    <button type="submit" class="btn btn-success w-25">登録</button><br>

</form>

    <form action="/targetDelete/{{$target->id}}" method="post">
    @csrf
        <div class="form-check">
            <label><input type="checkbox" class="checkbox" name="checkDelete" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
            <label class="form-check-label" for="invalidCheck3"> この人を削除します</label>
        </div>
        <button type="submit" class="btn btn-danger w-25">削除</button>
    </form>
</div>
@stop

@section('js')
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$(document).on("change",".preview-uploader",function(){
    let elem = this                                             
    let fileReader = new FileReader();                          
    fileReader.readAsDataURL(elem.files[0]);                    
    fileReader.onload = (function () {                          
        let imgTag = `<img src='${fileReader.result}'>`         
        $(elem).next(".preview").html(imgTag)                   
    });
})

$('#date').datepicker({ dateFormat: 'yy/mm/dd'});
$('#event2').change(function(){
    $('#date').datepicker("setDate", (new Date()).getFullYear() + "/12/25");
});

</script>
@stop