@extends('parent')
@section('title', 'ログアウト完了')
@section('content')
<div>
    <p>ログアウトが完了しました。</p>
    <a href="{{ route('Article.login') }}">ログイン画面に戻る</a>
</div>
@endsection