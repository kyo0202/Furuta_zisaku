@extends('layouts.app')
@section('content')
<form action="{{ route('userdestroy.destroy',$val->id )}}" method="post" class="needs-validation" novalidate>
    <input type="hidden" name="_method" value="delete">
    @method('delete')
    @csrf
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                    </tr>
                </thead>
                    <tr>
                        <td>{{ $user->id }}</td>

                        <td><a href="{{ url('users/'.$user->id) }}">{{ $user->name }}</a></td>
                        <td> <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection