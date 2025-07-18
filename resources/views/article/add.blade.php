@extends('parent')
@section('title', '記事登録')
@section('content')
<form method="POST" action="{{ route('Article.store') }}" enctype="multipart/form-data">
@csrf
@error('edit_title')<p>{{ $message }}</p>@enderror
@error('edit_story')<p>{{ $message }}</p>@enderror
@error('filez')<p>{{ $message }}</p>@enderror
    <input type="text" name="edit_title" placeholder="タイトル"><br>
    <input type="hidden" name="idd" value={{$processName}}><br>
    <textarea name="edit_story" placeholder="本文"></textarea><br>
    <input type="file" name="filez[]" size="20" multiple><br>
    <input type="submit" value="登録する">
    <input type="hidden" name="delete_story" value="0"><br>
</form>

<img src=" {{ asset('storage/images/G03OHqChA3Qo8m7tKsAFUUgEzlbMA6EXNM9U9Wyq.png')}}">
<p>
    ユーザーは{{$processName}}
</p>
@endsection