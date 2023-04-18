@extends('layouts.app')

@section('content')
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">馬券編集画面</a>
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
    <form action="{{route('horse.update',$betting_ticket_registration->id )}}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <input type="hidden" value="{{$id}}" name="race_details_id">
            <label for="race_details_id">日付 開催場所 レース </label>
            <select name=race_details_id class='form-control'>
                <option value="{{$race_detail['id']}}">{{$race_detail['date']}} {{$race_detail['place']}} {{$race_detail->race_name}}</option>
            </select>
            <!--開催場所-->
        </div>
        <br><br>

        <!--式別-->
        <div class="col-md-12">
            <label for="idevtification">式別</label>
            以前選択していた番号【{{$betting_ticket_registration->idevtification}}】
            <select name=idevtification class='form-control' value="{{$betting_ticket_registration->idevtification}}">
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
                <br>
                以前選択していた番号【{{$betting_ticket_registration->first_num}}】
                <select name=first_num class='form-control' multiple value="{{$betting_ticket_registration->first_num}}">
                    @foreach($b as $c)
                    <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="number">馬番　2頭目</label>
                <br>
                以前選択していた番号【{{$betting_ticket_registration->second_num}}】
                <select name=second_num class='form-control' multiple value="{{$betting_ticket_registration->second_num}}">
                    @foreach($b as $c)
                    <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="number">馬番　3頭目</label>
                <br>
                以前選択していた番号【{{$betting_ticket_registration->third_num}}】
                <select name=third_num class='form-control' multiple value="{{$betting_ticket_registration->third_num}}">
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
            <label for=amount>金額</label>
            <input type=amount class='form-control' name=amount value="{{$betting_ticket_registration->amount}}" />
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