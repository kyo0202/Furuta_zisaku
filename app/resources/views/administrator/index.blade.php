ユーザー一覧・削除ページ
@extends('layouts.app')
@section('content')
@foreach($race_details as $race_detail)
<tr>
    <th scope='col'>{{ $race_detail['date'] }}</th>
    <th scope='col'>{{ $race_detail['place'] }}</th>
    <th scope='col'>{{ $race_detail['race_name'] }}</th>
</tr>
<input name="race_detail_id" value="{{$race_detail['id']}}" type="hidden">
@endforeach

@endsection