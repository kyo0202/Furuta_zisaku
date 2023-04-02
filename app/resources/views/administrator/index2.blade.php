@extends('layouts.app')
@section('content')

<ul class="list-unstyled">
    @if(count($list)>0)
    @foreach ($list as $val)
    <tr>
        <th scope='col'>単勝　{{$val->win}}</th>
        <th scope='col'>複勝　{{$val->multiple_wins}}</th>
        <th scope='col'>馬連　{{$val->baren}}</th>
        <th scope='col'>馬単　{{$val->horse_single}}</th>
        <th scope='col'>ワイド　{{$val->wide}}</th>
        <th scope='col'>三連複　{{$val->triplets}}</th>
        <th scope='col'>三連単　{{$val->trio}}</th>
        <a href="{{route('administrator.edit',$val->id)}}" class="btn btn-warning">編集</a>
        <a href="{{route('administrator.destroy',$val->id)}}" class="btn btn-danger">削除</a>
        <br>
    </tr>

    @endforeach
    @endif
</ul>
@endsection