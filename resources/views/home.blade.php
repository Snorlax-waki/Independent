@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>ぷれKEY&nbsp;<img src="/img/アイコン/キー.png" class="key-icon">&emsp;<font size="3">プレゼント、何にしようかな。</font></h1>
@stop

<style>
    .key-icon{
        width: 100px;
    }
</style>

@section('content')

<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white shadow">
    <div class="text-center">
        <img src="/img/ぷれキー.gif" width="800">
        <br><br>
        <div class="row row-cols-md-3">
            <div class="col">
                <a class="btn btn-success w-75" href="/target/register">新規登録</a>
            </div>
            <div class="col">
                <a class="btn btn-secondary w-75" href="/target/index">贈る人一覧</a>
            </div>
            <div class="col">
                <a class="btn btn-info w-75" href="/target/search">検索</a>
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
