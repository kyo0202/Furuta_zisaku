@extends('layouts.app')

@section('content')
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">レース結果編集画面</a>
</nav>

<!-- Page Content -->
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
    <form action="{{ route('administrator.update',$val->id )}}" method="post" class="needs-validation" novalidate>
        <input type="hidden" name="_method" value="PUT">
        @method('PUT')
        @csrf


        <div class=" card-body">
            <div class="card-body">
                <div class="form-row mb-12">
                    <label for='date' class='mt-2'>日付</label>
                    <input type='date' class='form-control' name='date' id='date' value="{{$val->Race_detail->date}}" />
                </div>
                <br><br>

                <div class="form-row mb-12">
                    <p>開催場所</p>
                    <input type='text' class='form-control' name='horse_single' value="{{$val->Race_detail->place}}" />
                </div>
                <br><br>

                <div class="card-body">
                    <div class="form-row mb-12">
                        <p>レース名</p>
                        <input type='text' class='form-control' name='horse_single' value="{{$val->Race_detail->race_name}}" />
                    </div>
                    <br><br>

                </div>

                <div class="col-md-6">
                    <label>1着</label>
                    <select name='first_place' class='form-control'>
                        <option value="">{{$val['first_place']}}</option>
                        @foreach($b as $c)
                        <option value="{{$c}}">{{$c}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mb-12">
                    <div class="col-md-6">
                        <label>2着</label>
                        <select name='second_place' class='form-control'>
                            <option value="">{{$val['second_place']}}</option>
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
                            <option value="">{{$val['third_place']}}</option>
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
                        <input type='text' class='form-control' name='win' value="{{$val['first_place']}}" />
                    </div>
                </div>
                <br><br>

                <div class="form-row mb-12">
                    <div class="col-md-6">
                        <p>複勝 1着の馬</p>
                    </div>
                    <div class="col-md-6">
                        <label for='amount'>金額</label>
                        <input type='text' class='form-control' name='multiple_wins1' value="{{$multiple_wins[0]}}" />
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="col-md-6">
                        <p>複勝 2着の馬</p>
                    </div>
                    <div class="col-md-6">
                        <label>金額</label>
                        <input type='text' class='form-control' name='multiple_wins2' value="{{$multiple_wins[1]}}" />
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="col-md-6">
                        <p>複勝 3着の馬</p>

                    </div>
                    <div class="col-md-6">
                        <label for='amount'>金額</label>
                        <input type='text' class='form-control' name='multiple_wins3' value="{{$multiple_wins[2]}}" />
                    </div>
                </div>
                <br><br>

                <div class="form-row mb-12">
                    <div class="col-md-3">
                        <p>馬連</p>

                    </div>
                    <div class="col-md-6">
                        <label for='amount'>金額</label>
                        <input type='text' class='form-control' name='baren' value="{{$val['baren']}}" />
                    </div>
                </div>
                <br><br>

                <div class="form-row mb-12">
                    <div class="col-md-3">
                        <p>馬単</p>
                    </div>
                    <div class="col-md-6">
                        <label for='amount'>金額</label>
                        <input type='text' class='form-control' name='horse_single' value="{{$val['horse_single']}}" />
                    </div>
                </div>
                <br><br>

                <div class="form-row mb-12">
                    <div class="col-md-3">
                        <p>ワイド1着2着</p>
                    </div>
                    <div class="col-md-6">
                        <label>金額</label>
                        <input type='text' class='form-control' name='wide1' value="{{$wide[0]}}" />
                    </div>
                </div>

                <div class="form-row mb-12">
                    <div class="col-md-3">
                        <p>ワイド1着3着</p>
                    </div>
                    <div class="col-md-6">
                        <label for='amount'>金額</label>
                        <input type='text' class='form-control' name='wide2' value="{{$wide[1]}}" />
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="col-md-3">
                        <p>ワイド2着3着</p>
                    </div>
                    <div class="col-md-6">
                        <label>金額</label>
                        <input type='text' class='form-control' name='wide3' value="{{$wide[2]}}" />
                    </div>
                </div>
                <br><br>

                <div class="form-row mb-12">
                    <div class="col-md-2">
                        <p>三連複</p>
                    </div>

                    <div class="col-md-6">
                        <label>金額</label>
                        <input type='text' class='form-control' name='triplets' value="{{$val['triplets']}}" />
                    </div>
                </div>
                <br><br>

                <div class="form-row mb-12">
                    <div class="col-md-6">
                        <p>三連単</p>
                    </div>
                    <div class="col-md-6">
                        <label>金額</label>
                        <input type='text' class='form-control' name='trio' value="{{$val['trio']}}" />
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
        </div>
</div>
</form>

</div><!-- /container -->
@endsection