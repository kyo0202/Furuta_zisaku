@extends('layouts.app')
@section('content')
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

                <td><a href="{{route('profile.index')}}">{{$user->name}}</a></td>
                <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                @if (!$review->isLikedBy(Auth::user()))
                <span class="likes">
                    <i class="fas fa-music like-toggle" data-review-id="{{ $user->id }}"></i>
                    <span class="like-counter">{{$user->likes_count}}</span>
                </span><!-- /.likes -->
                @else
                <span class="likes">
                    <i class="fas fa-music heart like-toggle liked" data-review-id="{{ $user->id }}"></i>
                    <span class="like-counter">{{$user->likes_count}}</span>
                </span><!-- /.likes -->
                @endif
            </tr>
            @endforeach
        </table>
        </form>
    </div>
    @endsection