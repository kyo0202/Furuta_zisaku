@extends('layouts.app')
@section('content')
<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <form action="{{route('horse.show')}}">
                        <div class='text-center'>詳細画面</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>日付 開催場所 レース</th>
                                    <th scope='col'>式別</th>
                                    <th scope='col'>馬番　1頭目</th>
                                    <th scope='col'>馬番　2頭目</th>
                                    <th scope='col'>馬番　3頭目</th>
                                    <th scope='col'>金額</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ここに収入を表示する -->
                                <tr>
                                <tr>
                                    <th scope='col'>{{ $race_detail->race_details_id }}</th>
                                    <th scope='col'>{{ $race_detail->idevtifications }}</th>
                                    <th scope='col'>{{ $race_detail->first_num}}</th>
                                    <th scope='col'>{{ $race_detail->second_num }}</th>
                                    <th scope='col'>{{ $race_detail->third_num }}</th>
                                    <th scope='col'>{{ $race_detail->amount }}</th>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </tr>
        </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
</main>
<a href="{{ route('edit.income',['income' => $incomes['id']]) }}">
    <button class='btn btn-secondary'>編集</button>
</a>
<a href="{{ route('income.destroy',['income' => $incomes['id']]) }}">
    <button class='btn btn-secondary'>削除</button>
</a>
</div>
</form>
</body>

</html>
</div>
</body>

</html>
@endsection