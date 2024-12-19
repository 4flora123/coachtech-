<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  @yield('css')
</head>

<body>
  <div class="app">
    <header class="header">
      <img src="free-market-app/logo.jpg" class="header__heading" alt="COACHTECH"></img>
        @auth
        <form class="search-form" action="{{ route('home') }}" method="GET">
          <input class="search-input" type="text" name="query" placeholder="なにをお探しですか？" >
        </form>
        <div class="header-buttons">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="#" class="header__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    ログアウト
</a>
          <a href="{{ route('mypage') }}" class="header__link">マイページ</a>
          <a href="{{ route('sell') }}" class="header__link">出品</a>
        </div>
        @endauth
    </header>
    <div class="content">
      @yield('content')
    </div>
  </div>

</body>

</html>