@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>ぷれKEY&nbsp;<img src="/img/アイコン/キー.png" class="key-icon">&emsp;<font size="3">プレゼント、何にしようかな。</font></h1>
@stop

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<style>
    .key-icon{
        width: 100px;
    }

    .content-wrapper {
         overflow-y: auto;
    }

    .w20{
        width: 20%;
    }
</style>

@section('content')

<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white shadow">
    <div class="text-center">
        <img src="/img/ぷれキー.gif" width="700">
        <br><br>
        <font size="2">あの人の笑顔のためのヒント&nbsp;=&emsp;<mark class="bg-danger-subtle"><font size="3">KEY</font></mark>&nbsp;を集めてプレゼントを見つけよう</font>
        <br><br>
        <div class="button-group">
            <div class="row justify-content-center">
                <a class="btn btn-success w20" href="/target/register">新規登録</a>
                <a class="btn btn-secondary w20 ml-2" href="/target/index">贈る人一覧</a>
                <a class="btn btn-info w20 ml-2" href="/target/search">検索</a>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
