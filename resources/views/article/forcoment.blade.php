@extends('parent')
@section('title', '記事')
@section('content')
@foreach($article as $article)
<br>
<h2>{{ $article->coment }}</h2>
<br>
<hr size='3' color="#a9a9a9" width="450" align="left">
<br>
@endforeach

<form method="POST" action="{{ route('Article.store') }}">
@csrf
    <br>
    <input type="hidden" name="idd" value="{{ $article->idd }}"><br>
    <input type="hidden" name="edit_coment" value="{{ $article->id }}"><br>
    <input type="hidden" name="edit_title" value="{{ $article->edit_title }}"><br>
    <input type="hidden" name="edit_story" value="{{ $article->edit_story }}"><br>
    <textarea name="tocoment" placeholder="本文"></textarea><br>
    <input type="submit" value="コメント投稿">
</form>
@foreach($article2 as $article2)
<br>
{{ $article2->idd }}/{{ $article2->created_at }}
<br>
<p>{!! nl2br(e($article2->tocoment)) !!}</p>
<hr size='3' color="#a9a9a9" width="350" align="left">
@endforeach
@endsection