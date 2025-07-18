@extends('parent')
@section('title', 'ホーム')
@section('content')
<table>
    <tr>
        <th><p>登録者数</p>
<p>{{ $men->date }}</p>
<p>{{ $men->total_idd }}人</p></th>
    </tr>
    <tr>
        <th><p>投稿記事数</p>
<p>{{ $note->date2 }}</p>
<p>{{ $note->total_title}}個</p></th>
    </tr>
</table>
<a href="{{ route('Article.list') }}">スレッド一覧</a>
<br>
<a href="{{ route('Article.add') }}">新規投稿</a>
<br>
<a href="{{ route('Article.logout') }}">ログアウト</a>
@endsection