@extends('parent')
@section('title', '記事更新')
@section('content')
@foreach($article as $article)
<h1>{{ $article->title }}</h1>
<br>
<h2>{{ $article->story }}</h2>
<br>
<hr size='3' color="#a9a9a9" width="450" align="left">
<br>
@endforeach
<form method="POST" action="{{ route('Article.store') }}">
@csrf
@error('title')<p>{{ $message }}</p>@enderror
@error('body')<p>{{ $message }}</p>@enderror
    <br>
    <input type="hidden" name="idd" value="{{ $article->idd }}"><br>
    <input type="hidden" name="title" value="{{ $article->title }}"><br>
    <textarea name="coment" placeholder="本文">{{ $article->coment }}</textarea><br>
    <input type="submit" value="コメント投稿">
</form>
@foreach($article2 as $article2)
<br>
{{ $article2->idd }}/{{ $article2->created_at }}
<br>
<p>{!! nl2br(e($article2->coment)) !!}</p>

<hr size='3' color="#a9a9a9" width="350" align="left">
@endforeach
@endsection