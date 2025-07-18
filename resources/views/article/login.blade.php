@extends('parent')
@section('title', 'ログイン')
@section('content')
<form method="POST" action="{{ route('Article.home') }}">
@csrf
    ID：<input type="text" name="name1" placeholder="ID">
    <br>
    PW：<input type="text" name="pass1" placeholder="パスワード">
    <br>
    <input type="submit" value="ログイン">
</form>
<a href="{{ route('Article.touroku') }}">新規会員登録</a>
@endsection