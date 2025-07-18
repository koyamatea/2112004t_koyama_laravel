<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>ヘッダー</h1>
    </header>
    @yield('content')
    <footer>
        <h1>フッター</h1>
    </footer>
</body>
</html>