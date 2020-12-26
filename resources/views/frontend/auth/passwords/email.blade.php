@extends('layouts.app')

@section('title', 'メールアドレス再設定')

@section('content')
<div class="container">
    <div class="auth-form-group">
        <div class="form-card">
            <div class="body">
                <h1>パスワード再設定</h1>
                <form method="POST" action="{{ route('frontend.password.email') }}">
                    @csrf

                    <p class="how-to-message">
                        ご登録済みのメールアドレスを入力のうえ、<br>
                        受信したメールからパスワードの再設定を行ってください。
                    </p>

                    <div class="text-box">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary submit-btn">
                        送信
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
