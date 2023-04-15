@extends('layouts.app')

@section('content')
@can('admin_only')
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">レース結果登録画面</a>
</nav>

<!-- Page Content -->
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
        <form action="{{route('race_create')}}" method="post" class="needs-validation" novalidate>
            @csrf
            <!--日付-->
            <label for='date'>日付</label>
            <input type='date' class='form-control' name='date' id='date' />
            <br><br>
            <!--開催場所-->
            <div class="col-md-12">
                <label for='place'>開催場所</label>
                <input type='text' class='form-control' name='place' />
            </div>
            <br><br>
            <!--レース選択-->
            <div class="col-md-12">
                <label for='race_name'>レース名</label>
                <input type='text' class='form-control' name='race_name' />
            </div>
            <br><br>

            <!--ボタンブロック-->
            <div class="col-md-12">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block">次へ</button>
                </div>
            </div>
            <!--/ボタンブロック-->
        </form>
    </div>

</div><!-- /container -->
@endcan
@endsection