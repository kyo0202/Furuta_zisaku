@extends('layouts.app')
@section('content')
<form action="{{route('horse.index',$val->id)}}" method="post" class="needs-validation" novalidate>
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

                    <td><a href="{{ url('users/'.$users->id) }}">{{ $user->name }}</a></td>
                </tr>
                </tbody>
            </table>
</form>
</div>
@endsection