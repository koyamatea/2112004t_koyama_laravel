@extends('parent')
@section('title', '記事登録')
@section('content')
<form method="POST" action="{{ route('Article.store') }}">
@csrf
@error('title')<p>{{ $message }}</p>@enderror
@error('story')<p>{{ $message }}</p>@enderror
    <input type="text" name="title" placeholder="タイトル"><br>
    <input type="hidden" name="idd" value={{$processName}}><br>
    <textarea name="story" placeholder="本文"></textarea><br>
    <input type="submit" value="登録する">
</form>
<p>
    ユーザーは{{$processName}}
</p>
@endsection