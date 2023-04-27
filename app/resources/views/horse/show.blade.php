@extends('layouts.app')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>詳細画面</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>日付</th>
                                    <th scope='col'>開催場所</th>
                                    <th scope='col'>レース名</th>
                                    <th scope='col'>式別</th>
                                    <th scope='col'>馬番　1頭目</th>
                                    <th scope='col'>馬番　2頭目</th>
                                    <th scope='col'>馬番　3頭目</th>
                                    <th scope='col'>金額</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ここに収入を表示する -->
                                <tr>
                                    <th scope='col'>{{$val->date}}</th>
                                    <th scope='col'>{{$val->place}}</th>
                                    <th scope='col'>{{$val->race_name}}</th>
                                    <th scope='col'>{{ $betting_ticket_registration->idevtification }}</th>
                                    <th scope='col'>{{ $betting_ticket_registration->first_num}}</th>
                                    <th scope='col'>{{ $betting_ticket_registration->second_num }}</th>
                                    <th scope='col'>{{ $betting_ticket_registration->third_num }}</th>
                                    <th scope='col'>{{ $betting_ticket_registration->amount }}</th>
                                </tr>
                                @if($haraimodosi!=0)
                                <th scope='col'>
                                    <p class="text-danger">的中 払戻金額　￥{{ $haraimodosi }}</p>
                                </th>
                                @else
                                <th scope='col'>
                                    <p>払戻金額　￥{{ $haraimodosi }}</p>
                                </th>
                                @endif
                            </tbody>
                        </table>
                        <a href="{{ route('horse.edit',['horse' => $betting_ticket_registration['id']]) }}">
                            <button class='btn btn-secondary'>編集</button>
                        </a>
                        <form action="{{route('horse.destroy',['horse' => $betting_ticket_registration['id']])}}" method="post">
                            @method('delete')
                            @csrf
                            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                        </form>
                    </div>
                    @endsection