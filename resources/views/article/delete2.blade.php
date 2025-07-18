@extends('parent')
@section('title', 'コメント削除完了')
@section('content')
<div>
    <p>{{ $processName }}が完了しました。</p>
    <a href="{{ route('Article.list') }}">my一覧画面に戻る</a>
</div>
@endsection