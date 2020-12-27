<nav class="navbar">
    <a class="navbar-brand" href="{{ url('/') }}">
        アプリLogo
    </a>

    <!-- ②ナビゲーションメニュー -->
    <div class="nav-wrapper">
        <nav class="header-nav">
            <ul class="nav-list">
                @if(Auth::guard('user')->check())

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ Auth::guard('user')->user()->name_first }} {{ Auth::guard('user')->user()->name_second }}　様
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.password.request') }}">
                            パスワード再設定
                        </a>
                    </li>
                    <li class="nav-item">
                        <form class="nav-link" action="{{ route('frontend.logout') }}" method="POST">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>

                @elseif(Auth::guard('admin')->check())

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ Auth::guard('admin')->user()->name }}　様
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.user.index') }}">
                            会員情報
                        </a>
                    </li>
                    <li class="nav-item">
                        <form class="nav-link" action="{{ route('backend.logout') }}" method="POST">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.login') }}">ログイン</a>
                    </li>
                    @if (Route::has('frontend.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.register') }}">新規会員登録</a>
                        </li>
                    @endif

                @endif
            </ul>
        </nav>
    </div>

    <!-- ③ハンバーガーボタン -->
    <div id="burger-btn" class="open">
        <span class="bar bar_top"></span>
        <span class="bar bar_mid"></span>
        <span class="bar bar_bottom"></span>
    </div>
</nav>
<div id="nav-touch-background" class="off"></div>

