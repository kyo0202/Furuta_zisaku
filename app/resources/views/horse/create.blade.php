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
        <br><br>
        <!--開催場所-->
        <div class="col-md-12">
            <label for="place">開催場所</label>
            <select name='type_id' class='form-control'>
                @foreach($race_details as $race_detail)
                <option value="{{$race_detail['place']}}">{{$race_detail['place']}}</option>
                @endforeach
            </select>
            <!--開催場所-->
        </div>
        <br><br>
        <!--レース選択-->
        <div class="col-md-12">
            <label for="race_name ">レース選択</label>
            <select name='type_id' class='form-control'>
                @foreach($race_details as $race_detail)
                <option value="{{$race_detail->race_name}}">{{$race_detail->race_name}}</option>
                @endforeach
            </select>
        </div>
        <br><br>
        <!--レース選択-->
        <!--式別-->
        <div class="col-md-12">
            <label for="idevtification">式別</label>
            <select name='type_id' class='form-control'>
                @foreach($idevtifications as $idevtification)
                <option value="{{$idevtification}}">{{$idevtification}}</option>
                @endforeach
            </select>
        </div>
        <br><br>
        <!--式別-->

        <!--馬番-->
        <div class="form-row mb-12">
            <div class="col-md-4">
                <label for="number">馬番　1頭目</label>
                <select name='third_place' class='form-control' multiple>
                    @foreach($b as $c)
                    <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="number">馬番　2頭目</label>
                <select name='third_place' class='form-control' multiple>
                    @foreach($b as $c)
                    <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="number">馬番　3頭目</label>
                <select name='third_place' class='form-control' multiple>
                    @foreach($b as $c)
                    <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!--馬番-->
        <br><br>
        <!--備考欄-->
        <div class="col-md-12">
            <label for='amount'>金額</label>
            <input type='text' class='form-control' name='amount' />
        </div>
        <!--/備考欄-->
        <br><br>
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