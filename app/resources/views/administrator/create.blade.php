@extends('layouts.app')

@section('content')
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">レース結果登録画面</a>
</nav>

<!-- Page Content -->
<div class="container mt-5 p-lg-5 bg-light">

    <form action="{{route('administrator.store')}}" method="post" class="needs-validation" novalidate>
        @csrf
        <!--日付-->
        <label for='date'>日付</label>
        <input type='date' class='form-control' name='date' id='date' />
        <br><br>
        <!--開催場所-->
        <div class="col-md-12">
            <label for='amount'>開催場所</label>
            <input type='text' class='form-control' name='amount' />
        </div>
        <br><br>
        <!--レース選択-->
        <div class="col-md-12">
            <label for='amount'>レース名</label>
            <input type='text' class='form-control' name='amount' />
        </div>
        <!--レース選択-->
        <br><br>
        <!--氏名-->
        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="win">単勝</label>
                <select name='win' class='form-control'>
                    @foreach($b as $c)
                    <option value="">{{$c}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <br><br>

        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="multiple_wins">複勝</label>
                <select name='multiple_wins' class=' form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="multiple_wins">　</label>
                <select name='multiple_wins' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="multiple_wins">　</label>
                <select name='multiple_wins' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <br><br>

        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="">馬連</label>
                <select name='type_id' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <br><br>

        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="baren">馬連</label>
                <select name='baren' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <br><br>

        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="horse_single">馬単</label>
                <select name='horse_single' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <br><br>

        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="wide">ワイド</label>
                <select name='wide' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="wide">　</label>
                <select name='wide' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="wide">　</label>
                <select name='wide' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <br><br>

        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="triplets">三連複</label>
                <select name='triplets' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
            </div>
        </div>
        <br><br>

        <div class="form-row mb-12">
            <div class="col-md-6">
                <label for="trio">3連単</label>
                <select name='trio' class='form-control'>
                    <option value='' hidden>馬番</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for='amount'>金額</label>
                <input type='text' class='form-control' name='amount' />
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