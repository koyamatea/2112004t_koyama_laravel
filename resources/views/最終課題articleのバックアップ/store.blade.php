@extends('parent')
@section('title', '記事登録完了')
@section('content')
<div>
    <p>登録が完了しました。</p>
    <a href="{{ route('Article.list') }}">my一覧画面に戻る</a>
</div>
@endsection