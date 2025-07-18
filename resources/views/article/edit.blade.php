@extends('parent')
@section('title', '記事更新')
@section('content')
<form method="POST" action="{{ route('Article.store') }}">
@csrf
@error('title')<p>{{ $message }}</p>@enderror
@error('edit_story')<p>{{ $message }}</p>@enderror
    <input type="hidden" name="id" value="{{ $article->id }}"><br>
    <input type="hidden" name="idd" value="{{ $article->idd }}"><br>
    <input type="hidden" name="delete_story" value="0"><br>
    <input type="text" name="edit_title" placeholder="タイトル" value="{{ $article->edit_title }}"><br>
    <textarea name="edit_story" placeholder="本文">{{ $article->edit_story }}</textarea><br>
    <input type="submit" value="更新する">
</form>
@endsection