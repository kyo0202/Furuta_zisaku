@extends('layouts.app')
@section('content')
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">レース結果登録画面</a>
</nav>

<!-- Page Content -->
<div class="container mt-5 p-lg-5 bg-light">
    <div class="container mt-5 p-lg-5 bg-light">
        <div class="container mt-5 p-lg-5 bg-light">
            <div class='panel-body'>
                @if($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach($errors->all() as $message)
                        <li>{{ $message}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <form action="{{route('administrator.store')}}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <tbody>
                                <!-- ここに収入を表示する -->
                                @foreach($race_details as $race_detail)
                                <tr>
                                    <th scope='col'>{{ $race_detail['date'] }}</th>
                                    <th scope='col'>{{ $race_detail['place'] }}</th>
                                    <th scope='col'>{{ $race_detail['race_name'] }}</th>
                                </tr>
                                <input name="race_detail_id" value="{{$race_detail['id']}}" type="hidden">
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <label>1着</label>
                                <select name='first_place' class='form-control'>
                                    @foreach($b as $c)
                                    <option value="{{$c}}">{{$c}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <label>2着</label>
                                <select name='second_place' class='form-control'>
                                    @foreach($b as $c)
                                    <option value="{{$c}}">{{$c}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <label>3着</label>
                                <select name='third_place' class='form-control'>
                                    @foreach($b as $c)
                                    <option value="{{$c}}">{{$c}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>


                        <!--氏名-->
                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <label>単勝</label>
                            </div>
                            <div class="col-md6">
                                <label>金額</label>
                                <input type='text' class='form-control' name='win' />
                            </div>
                        </div>
                        <br><br>

                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <p>複勝 1着の馬</p>
                            </div>
                            <div class="col-md-6">
                                <label for='amount'>金額</label>
                                <input type='text' class='form-control' name='multiple_wins1' />
                            </div>
                        </div>
                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <p>複勝 2着の馬</p>
                            </div>
                            <div class="col-md-6">
                                <label>金額</label>
                                <input type='text' class='form-control' name='multiple_wins2' />
                            </div>
                        </div>
                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <p>複勝 3着の馬</p>

                            </div>
                            <div class="col-md-6">
                                <label for='amount'>金額</label>
                                <input type='text' class='form-control' name='multiple_wins3' />
                            </div>
                        </div>
                        <br><br>

                        <div class="form-row mb-12">
                            <div class="col-md-3">
                                <p>馬連</p>

                            </div>
                            <div class="col-md-6">
                                <label for='amount'>金額</label>
                                <input type='text' class='form-control' name='baren' />
                            </div>
                        </div>
                        <br><br>

                        <div class="form-row mb-12">
                            <div class="col-md-3">
                                <p>馬単</p>
                            </div>
                            <div class="col-md-6">
                                <label for='amount'>金額</label>
                                <input type='text' class='form-control' name='horse_single' />
                            </div>
                        </div>
                        <br><br>

                        <div class="form-row mb-12">
                            <div class="col-md-3">
                                <p>ワイド1着2着</p>
                            </div>
                            <div class="col-md-6">
                                <label>金額</label>
                                <input type='text' class='form-control' name='wide1' />
                            </div>
                        </div>

                        <div class="form-row mb-12">
                            <div class="col-md-3">
                                <p>ワイド1着3着</p>
                            </div>
                            <div class="col-md-6">
                                <label for='amount'>金額</label>
                                <input type='text' class='form-control' name='wide2' />
                            </div>
                        </div>
                        <div class="form-row mb-12">
                            <div class="col-md-3">
                                <p>ワイド2着3着</p>
                            </div>
                            <div class="col-md-6">
                                <label>金額</label>
                                <input type='text' class='form-control' name='wide3' />
                            </div>
                        </div>
                        <br><br>

                        <div class="form-row mb-12">
                            <div class="col-md-2">
                                <p>三連複</p>
                            </div>

                            <div class="col-md-6">
                                <label>金額</label>
                                <input type='text' class='form-control' name='triplets' />
                            </div>
                        </div>
                        <br><br>

                        <div class="form-row mb-12">
                            <div class="col-md-6">
                                <p>三連単</p>
                            </div>
                            <div class="col-md-6">
                                <label>金額</label>
                                <input type='text' class='form-control' name='trio' />
                            </div>
                        </div>
                        <br><br>
                        <!--/氏名-->

                        <!--ボタンブロック-->
                        <div class="col-md-12">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">登録</button>
                            </div>
                        </div>
                        <!--/ボタンブロック-->
                    </div>
            </form>

        </div><!-- /container -->
        @endsection