@extends('layouts.app')

@section('content')
<div class="card border-dark mb-3" style="max-width: 30rem;">
    <div class=" col-md-16">
            <form method="POST" action="/upload" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <img src="{{asset($image->image_path)}}" width="200" height="200">
                    <a href="{{route('profile.index')}}">{{Auth::user()->name}}</a>
                </div>
                <input type="file" name="image">
                <button>アップロード</button>
            </form>
    </div>
</div>
@endsection