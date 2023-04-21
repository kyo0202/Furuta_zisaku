@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレスの確認') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('お客様のEメールアドレスに新しい認証リンクが送信されました。') }}
                    </div>
                    @endif

                    {{ __('先に進む前に、認証リンクが記載されたメールをご確認ください。') }}
                    {{ __('メールが届かなかった方') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('別の依頼をする場合はこちらをクリックしてください。') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection