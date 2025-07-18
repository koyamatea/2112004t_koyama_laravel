@extends('parent')
@section('title', 'コメント更新')
@section('content')
<form method="POST" action="{{ route('Article.store') }}">
@csrf
    <input type="hidden" name="id" value="{{ $article->id }}"><br>
    <input type="hidden" name="idd" value="{{ $article->idd }}"><br>
    <input type="hidden" name="title" value="{{ $article->title }}"><br>
    <input type="hidden" name="edit_title" value="{{ $article->edit_title }}"><br>
    <input type="hidden" name="edit_story" value="{{ $article->edit_story }}"><br>
    <textarea name="coment" placeholder="本文">{{ $article->coment }}</textarea><br>
    <input type="submit" value="更新">
</form>
@endsection