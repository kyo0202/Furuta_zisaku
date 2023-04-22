@extends('layouts.app')
@section('content')
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">ユーザー削除画面</a>
</nav>
<br>
<div class="container">
    @method('delete')
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
                    <td> <a href="{{ route('destroyform',['id'=>$user->id]) }}" class="btn btn-danger" onclick='return confirm("削除しますか？");'>削除</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection