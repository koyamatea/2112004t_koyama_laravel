@extends('parent')
@section('title', $article->title)
@section('content')
<div>
    <p>{{ $article->body }}</p>
</div>
@endsection