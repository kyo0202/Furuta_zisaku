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
                <tr>
                    <td>{{ $users->id }}</td>
                    <td><a href="{{ url('users/'.$users->id) }}">{{ $user->name }}</a></td>
                </tr>
                </tbody>
            </table>
</form>
</div>
@endsection