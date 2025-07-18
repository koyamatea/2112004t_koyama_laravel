@extends('parent')
@section('title', '仮送信')
@section('content')
<div>
    <p>{{ $processName }}</p>
    <br>
    <a href="{{ route('Article.login') }}">ログイン画面に戻る</a>
</div>
@endsection