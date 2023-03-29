@extends('layouts.app')

@section('content')
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">馬券登録フォーム</a>
</nav>

<!-- Page Content -->
<div class="container mt-5 p-lg-5 bg-light">

    <form action="{{route('horse.store')}}" method="post" class="needs-validation" novalidate>
        @csrf
        <!--日付-->
        <label for='date'>日付</label>
        <input type='date' class='form-control' name='date' id='date' />

        <!--開催場所-->
        <div class="col-md-12">
            <label for="place">開催場所</label>
            <select name='type_id' class='form-control'>
                <option value='' hidden>カテゴリ</option>
            </select>
            <!--開催場所-->
        </div>
        <!--レース選択-->
        <div class="col-md-12">
            <label for="race_name ">レース選択</label>
            <select name='type_id' class='form-control'>
                <option value='' hidden>カテゴリ</option>
            </select>
        </div>
        <!--レース選択-->
        <!--式別-->
        <div class="col-md-12">
            <label for="devtification">式別</label>
            <select name='type_id' class='form-control'>
                <option value='' hidden>カテゴリ</option>
            </select>
        </div>
        <!--式別-->

        <!--馬番-->
        <div class="col-md-12">
            <label for="number">馬番</label>
            <select name='type_id' class='form-control'>
                <option value='' hidden>カテゴリ</option>
            </select>
        </div>
        <!--馬番-->

        <!--備考欄-->
        <div class="col-md-12">
            <label for='amount'>金額</label>
            <input type='text' class='form-control' name='amount' />
        </div>
        <!--/備考欄-->

        <!--ボタンブロック-->
        <div class="col-md-12">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">登録</button>
            </div>
        </div>
        <!--/ボタンブロック-->

    </form>

</div><!-- /container -->
@endsection