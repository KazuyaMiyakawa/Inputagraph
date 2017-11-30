<header>
  <ul class="header-items">
    <li></li>
    <li>inputagraph</li>

    <li id="menu-parent">
      <ul id="menu" class="closed">
        <li><img src="images/icon_menu.png" alt="MENU">
          <ul class="menu-child">
            @if (Route::has('login'))
              @auth
                <li><a href="{{ url('/list') }}">ホーム</a></li>
                <li><a href="{{ url('/upload') }}">投稿</a></li>
                <li><a href="{{ url('/user') }}">マイアカウント</a></li>
                <li><a href="{{ url('/logout') }}">ログアウト</a></li>
              @else
                <li><a href="{{ route('login') }}">ログイン</a></li>
                <li><a href="{{ route('register') }}">ユーザー登録</a></li>
              @endauth
            @endif
          </ul>
        </li>
      </ul>
    </li>

  </ul>

</header>
