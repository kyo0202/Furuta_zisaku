    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-centar">
                <form action="{{ route('home') }}" method="GET">
                    <img src=" {{asset($image->image_path)}}" width="100" height="100">
                    <a href="{{route('profile.index')}}">{{Auth::user()->name}}</a>
                    <div class="float-right">
                        <div class="mt-4">
                            <label for="">日付検索</label>
                            <input type="date" name="from" placeholder="from_date" value="{{ $from }}">
                            <span class="mx-3">~</span>
                            <input type="date" name="until" placeholder="until_date" value="{{ $until }}">
                            <input type="text" name="keyword" value="{{ $keyword }}">
                            <input type="submit" value="検索">
                            <a href="{{route('horse.create')}}" class="btn btn-primary">馬券登録ページ</a>
                            <a href="{{route('horse.index')}}" class="btn btn-success">収支ランキングページ</a>
                        </div>
                    </div>
                    @can('admin_only')
                    <div class="float-right">
                        <a href="{{route('index2')}}" class="btn btn-warning">レース結果一覧・削除</a>
                        <a href="{{route('administrator.create')}}" class="btn btn-warning">レース結果登録</a>
                        <a href="{{route('userdestroy.index')}}" class="btn btn-danger">ユーザー一覧・削除</a>
                    </div>
                    @endcan
                </form>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-18">
                        <div class="container">
                            <div class="row">
                                <div class="col">購 入 金 額 ￥{{"$num"}}</div>
                                <div class="col">払 戻 金 額　￥haraimodosi</div>
                
                                <div class="col">
                                    <p class="text-primary"> 収 支　￥shyushi</p>
                                </div>
                        
                                <div class="col">回 収 率　recovery_rate％</div>
                            </div>
                            <form action="route('horse.show',['horse'=>$betting_ticket_registration['id']])">
                                <div class="card-header">月別収支リスト</div>
                                <div class="container">
                                    <div class="row">
                                        @for($i = 1; $i < 13; $i++) <div class="col-3">
                                            <div class="card">{{$i}}月
                                            </div>
                                            @foreach ($betting_ticket_registrations as $betting_ticket_registration)
                                            @if($i==$betting_ticket_registration->date->format('n'))
                                            <td>
                                                <div class="col"><a href="{{ route('horse.show',['horse'=>$betting_ticket_registration['id']])}}">{{ $betting_ticket_registration->date->format('n月j日') }} {{$betting_ticket_registration->place}} {{$betting_ticket_registration->idevtification}}{{$betting_ticket_registration->amount}}</a>
                                                </div>
                                            </td>
                                            @elseif(empty($betting_ticket_registration->date->format('n')))
                                            <td> </td>
                                            @endif
                                            @endforeach
                                    </div>
                                    @endfor
                                </div>
                                <div class="card-body">
                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endsection