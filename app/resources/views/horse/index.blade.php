@extends('layouts.app')
@section('content')

<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">ユーザーランキング表示画面</a>
</nav>
<br>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('画像') }}</th>
                    <th>{{ __('ニックネーム') }}</th>
                </tr>
            </thead>
            <tr>
                @foreach($users as $user)
                <td><img src="{{asset($user->image_path)}}" width="100" height="100"></td>
                <td><a href="{{route('profile.index')}}">{{$user->name}}</a>
                    <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                    @if (!$review->isLikedBy(Auth::user()))
                    <span class="likes">
                        <i class="fa-regular fa-heart like-toggle" data-user_liked_id="{{ $user->id }}"></i>
                        <span class="like-counter">{{$user->likes_count}}</span>
                    </span><!-- /.likes -->
                    @else
                    <span class="likes">
                        <i class="fa-solid fa-heart like-toggle liked" data-user_liked_id="{{ $user->id }}"></i>
                        <span class="like-counter">{{$user->likes_count}}</span>
                    </span><!-- /.likes -->
                    @endif
            </tr>
            </td>
            @endforeach
        </table>
        </form>
    </div>
    @endsection
    <style>
        .liked {
            color: red;
        }
    </style>