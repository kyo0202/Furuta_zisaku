@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <img src="..." class="img-fluid" alt="..."><a>アイコン画像</a>
            <a href="{{route('profile.index')}}">ユーザー名</a>
        </div>
        <div class=" col">
            <div class="col">
                <div class="text-right">
                    <a href="{{route('horse.create')}}" class="btn btn-primary">馬券登録ページ</a>
                    <a href="{{route('horse.index')}}" class="btn btn-success">収支ランキングページ</a>
                </div>
                <div class="text-right">
                    <a href="{{route('home')}}" class="btn btn-warning">トップへ戻る</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col">購 入 金 額￥○○</div>
                            <div class="col">払 戻 金 額　￥○○</div>
                            <div class="col"> 収 支　±￥○○</div>
                            <div class="col">回 収 率　○○％</div>
                        </div>
                        <div class="card-header">月別収支リスト</div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card">1月</div>
                                </div>
                                <div class="col">
                                    <div class="card">2月</div>
                                </div>
                                <div class="col">
                                    <div class="card">3月</div>
                                </div>
                                <div class="col">
                                    <div class="card">4月</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">5月</div>
                                </div>
                                <div class="col">
                                    <div class="card">6月</div>
                                </div>
                                <div class="col">
                                    <div class="card">7月</div>
                                </div>
                                <div class="col">
                                    <div class="card">8月</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">9月</div>
                                </div>
                                <div class="col">
                                    <div class="card">10月</div>
                                </div>
                                <div class="col">
                                    <div class="card">11月</div>
                                </div>
                                <div class="col">
                                    <div class="card">12月</div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection