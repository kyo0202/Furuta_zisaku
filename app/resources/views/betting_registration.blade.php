@extends('layouts.app')

@section('content')
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Bootstrap4 フォームコンポーネント ( HTMLバリデーション )</a>
</nav>

<!-- Page Content -->
<div class="container mt-5 p-lg-5 bg-light">

    <form action="{{route('horse.store')}}" method="post" class="needs-validation" novalidate>
@csrf
        <!--氏名-->
        <div class="form-row mb-4">
            <div class="col-md-6">
                <label for="lastName">名字</label>
                <input type="text" class="form-control" id="lastName" placeholder="名字" required>
                <div class="invalid-feedback">
                    入力してください
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="firstName">名前</label>
                <input type="text" class="form-control" id="firstName" placeholder="名前" required>
                <div class="invalid-feedback">
                    入力してください
                </div>
            </div>
        </div>
        <!--/氏名-->

        <!--Eメール-->
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Eメール</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Eメール" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
        </div>
        <!--/Eメール-->

        <!--パスワード-->
        <div class="form-group row mb-5">
            <label for="inputPassword" class="col-sm-2 col-form-label">パスワード</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="パスワード" required>
                <div class="invalid-feedback">入力してください</div>
                <small id="passwordHelpBlock" class="form-text text-muted">パスワードは、文字と数字を含めて8～20文字で、空白、特殊文字、絵文字を含むことはできません。</small>
            </div>
        </div>
        <!--/パスワード-->

        <!--住所-->
        <div class="form-row">
            <div class="col-md-3 mb-5">
                <label for="inputAddress01">郵便番号(7桁)</label>
                <input type="text" name="zip01" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" class="form-control" id="inputAddress01" placeholder="1030013" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <div class="col-md-3">
                <label for="inputAddress02">都道府県</label>
                <input type="text" name="pref01" id="inputAddress02" class="form-control" placeholder="東京都" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <div class="col-md-6">
                <label for="inputAddress03">住所</label>
                <input type="text" name="addr01" class="form-control" id="inputAddress03" placeholder="中央区日本橋人形町" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
        </div>
        <!--/住所-->

        <!--性別-->
        <div class="form-group">
            <div class="row mb-4">
                <legend class="col-form-label col-sm-2">性別</legend>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadioInline1">女性</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">男性</label>
                    </div>
                </div>
            </div>
        </div>
        <!--/性別-->

        <!--ファイル選択-->
        <div class="custom-file mb-5">
            <input type="file" class="custom-file-input pb-3" id="customFile" required>
            <label class="custom-file-label pb-3" for="customFile">ファイル選択...</label>
            <div class="invalid-feedback">ファイルを選択してください</div>
        </div>
        <!--/ファイル選択-->

        <!--備考欄-->
        <div class="form-group pb-3">
            <label for="Textarea">備考欄</label>
            <textarea class="form-control" id="Textarea" rows="3" placeholder="その他、質問などありましたら" required></textarea>
            <div class="invalid-feedback">入力してください</div>
        </div>
        <!--/備考欄-->

        <!--利用規約-->
        <div class="form-group pb-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="custom-control-label" for="invalidCheck">
                    利用規約に同意する
                </label>
                <div class="invalid-feedback mb-3">提出する前に同意する必要があります</div>
            </div>
        </div>
        <!--/利用規約-->

        <!--ボタンブロック-->
        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">登録</button>
            </div>
        </div>
        <!--/ボタンブロック-->

    </form>

</div><!-- /container -->
@endsection