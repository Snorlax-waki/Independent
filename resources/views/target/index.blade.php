@extends('adminlte::page')

@section('title', '贈る人一覧')

@section('content_header')
    <h1>贈る人一覧</h1>
@stop

<style>
    .img{
        border-radius: 50%;
    }
</style>

@section('content')
<div class="container mt-1 pt-lg-3 pb-lg-5 px-lg-5 bg-white">

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-success" href="/target/register">新規登録</a>
  </div><br>

  <table class="table table-bordered text-center">

                        <thead>
                            <tr>
                                <th>お名前</th>
                                <th></th>
                                <th>贈る日</th>
                                <th>イベント</th>
                                <th>ステータス</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($target as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>@if($value->image!=null)<img src="data:image/jpg;base64,{{ $value->image }}" class="img">@else<img src="/img/noimage.png"> @endif</td>
                                    <td>{{ $value->xday }}</td>
                                    <td>{{ config('event.event.'.$value->event) }}</td>
                                    <td>{{ config('status.status.'.$value->status) }}</td>
                                    <td><a class="btn btn-info" href="/target/information/{{$value->id}}">情報</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop