@extends('layouts.app')

@section('content')
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">ユーザープロフィール画像変更</a>
</nav>
    <div class="container mt-5 pl-5 bg-light">
        <div class="card border-dark pl-5" style="max-width: 40rem;">
            <form method="POST" action="/upload" enctype="multipart/form-data">
                <div class="col">
                    <img src="{{asset($image->image_path)}}" width="400" height="400">
                    <a href="{{route('profile.index')}}">{{Auth::user()->name}}</a>
                </div>
                <input type="file" name="image">
                <button>アップロード</button>
            </form>
        </div>
</div>
@endsection