@extends('parent')
@section('title', '記事一覧')
@section('content')
<table>
    <tr>
        <th>ユーザーID</th>
        <th>タイトル</th>
        <th>本文</th>
        <th>登録日時</th>
        <th>更新日時</th>
    </tr>
    @foreach($articles as $article3)
    <tr>
        <td>{{ $article3->idd }}</td>
        <td><a href="{{ route('Article.mod', ['title' => $article3->title]) }}">{{ $article3->title }}</a></td>
        <td>{!! nl2br(e($article3->story)) !!}</td>
        <td>{{ $article3->created_at }}</td>
        <td>{{ $article3->updated_at }}</td>
    </tr>
    @endforeach
</table>
<a href="{{ route('Article.add') }}">新規投稿</a>
<br>
<a href="{{ route('Article.home') }}">ホーム</a>
@endsection