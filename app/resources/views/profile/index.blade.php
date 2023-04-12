@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card-body">
        <form method="POST" action="/upload" enctype="multipart/form-data" >
            @csrf
            <div class="col">
                <img src="{{asset($image->image_path)}}" width="100" height="100">
                <a href="{{route('profile.index')}}">{{Auth::user()->name}}</a>
            </div>
            <input type="file" name="image">
            <button>アップロード</button>
        </form>
    </div>
</div>
@endsection