ユーザー一覧・削除ページ
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td><a href="{{ url('users/'.$user->id) }}">{{ $user->name }}</a></td>
                    <td> <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection