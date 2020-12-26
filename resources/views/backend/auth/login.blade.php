@extends('layouts.app')

@section('title', '管理ユーザーログイン')

@section('content')
<div class="container">
    <div class="auth-form-group">
        <div class="form-card">
            <div class="body">
                <h1>管理ユーザー ログイン</h1>
                    <form method="POST" action="{{ route('backend.login') }}">
                        @csrf

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

                        <div class="text-box">
                            <label for="password">パスワード</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

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

                        @if (Route::has('backend.password.request'))
                            <a class="btn btn-link forgot-pass" href="{{ route('backend.password.request') }}">
                                パスワードをお忘れの方はこちら
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary submit-btn">
                            ログイン
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
