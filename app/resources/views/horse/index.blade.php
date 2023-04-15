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
        </tr>
            @endforeach
        </table>
        </form>
    </div>
    @endsection