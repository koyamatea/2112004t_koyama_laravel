@extends('parent')
@section('title', 'ユーザー登録')
@section('content')
<form method="POST" action="{{ route('Article.touroku2') }}">
@csrf
    ID：<input type="text" name="name" placeholder="ID">
    <br>
    PW：<input type="text" name="pass" placeholder="パスワード">
    <br>
    メールアドレス：<input type="text" name="email" placeholder="メールアドレス">
    <br>
    <br>
    
    <br>
    <br>
    <input type="submit" value="仮登録する">
</form>
<a href="{{ route('Article.login') }}">ログイン画面</a>
@endsection
<!-- メールアドレス（確認用）：<input type="text" name="Check_email" placeholder="メールアドレス（確認用）"> -->