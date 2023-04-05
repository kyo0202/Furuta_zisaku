@extends('layouts.app')

@section('content')
@can('admin_only')
<ul class="list-unstyled">
    @foreach ($list as $val)
    <tr>
        <th scope='col'>日付　{{$val->Race_detail->date}}</th>
        <th scope='col'>開催場所　{{$val->Race_detail->place}}</th>
        <th scope='col'>レース名　{{$val->Race_detail->race_name}}</th>
        <th scope='col'>単勝　{{$val->win}}</th>
        <th scope='col'>複勝　{{$val->multiple_wins}}</th>
        <th scope='col'>馬連　{{$val->baren}}</th>
        <th scope='col'>馬単　{{$val->horse_single}}</th>
        <th scope='col'>ワイド　{{$val->wide}}</th>
        <th scope='col'>三連複　{{$val->triplets}}</th>
        <th scope='col'>三連単　{{$val->trio}}</th>
        <a href="{{route('administrator.edit',$val->id)}}" class="btn btn-warning">編集</a>
        <a href="{{route('administrator.index3',$val->id)}}" class="btn btn-danger">削除</a>
        <br>
    </tr>
    @endforeach
</ul>
@endcan
@endsection