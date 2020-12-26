@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<div class="container">
    <div class="auth-form-group">
        <div class="form-card">
            <div class="body">
                <h1>ログイン</h1>
                <form method="POST" action="{{ route('frontend.login') }}">
                    @csrf

                    <div class="text-box">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-box">
                        <label for="password">パスワード</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    パスワードを保存する
                                </label>
                            </div>
                        </div>
                    </div>

                    @if (Route::has('frontend.password.request'))
                        <a class="btn btn-link forgot-pass" href="{{ route('frontend.password.request') }}">
                            パスワードをお忘れの方はこちら
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary submit-btn">
                        ログイン
                    </button>

                    <label class="transition-label">
                        会員登録がまだの方はこちら：
                        <a class="btn btn-link transition-btn" href="{{ route('frontend.register') }}">
                            新規会員登録
                        </a>
                    </label>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
