@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ぷれキー</h1>
@stop

@section('content')


<div class="text-center">
    <p>プレゼント探そう</p>
    <img src="">
<div class="d-md-flex flex-row justify-content-center">
    <div class="p-2">
        <a class="btn btn-success" href="/target/register">新規登録</a>
    </div>
    <div class="p-2">
        <a class="btn btn-primary" href="/target/index">贈る人一覧</a>
    </div>
    <div class="p-2">
        <a class="btn btn-info" href="/target/search">検索</a>
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
