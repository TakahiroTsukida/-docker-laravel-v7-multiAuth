@extends('layouts.app')

@section('title', '新規登録')

@section('content')
<div class="container">
    <div class="auth-form-group">
        <div class="form-card">
            <div class="body">
                <h1>新規会員登録</h1>
                <form method="POST" action="{{ route('frontend.register') }}">
                    @csrf

                    <div class="text-box">
                        <label class="name">名前</label>
                        <input id="name_first" type="text" class="text-first form-control @error('name_first') is-invalid @enderror" name="name_first"
                               value="{{ old('name_first') }}" required autocomplete="name" autofocus
                               placeholder="(例)田中">
                        @error('name_first')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="name_second" type="text" class="text-second form-control @error('name_second') is-invalid @enderror" name="name_second"
                               value="{{ old('name_second') }}" required autocomplete="name" autofocus
                               placeholder="太郎">
                        @error('name_second')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-box">
                        <label class="kana">カタカナ<small>（全角）</small></label>
                        <input id="kana_first" type="text" class="text-first form-control @error('kana_first') is-invalid @enderror" name="kana_first"
                               value="{{ old('kana_first') }}" required autocomplete="name" autofocus
                               placeholder="(例)タナカ">
                        @error('kana_first')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="kana_second" type="text" class="text-second form-control @error('kana_second') is-invalid @enderror" name="kana_second"
                               value="{{ old('kana_second') }}" required autocomplete="name" autofocus
                               placeholder="タロウ">
                        @error('kana_second')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-box">
                        <label for="gender">性別</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">選択してください</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                        </select>
                    </div>

                    <div class="text-box">
                        <label for="birthday">生年月日</label>
                        <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror"
                               value="{{ old('birthday') }}" required autocomplete="name" autofocus>
                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-box">
                        <label for="phone">電話番号<small>（ハイフン無し）</small></label>
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                               required autocomplete="name" autofocus placeholder="(例)09012345678">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-box">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                               required autocomplete="email" placeholder="(例)abc.edf@ghi.co.jp">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-box">
                    <label for="password">パスワード<small>（４ケタ以上 半角英数字可）</small></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-box">
                        <label for="password-confirm">パスワード<small>（確認用）</small></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="my-5"></div>

                    <button type="submit" class="btn btn-primary submit-btn">
                        新規会員登録
                    </button>

                    <label class="transition-label">
                        会員の方はこちら：
                        <a class="btn btn-link transition-btn" href="{{ route('frontend.login') }}">
                            ログイン
                        </a>
                    </label>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
