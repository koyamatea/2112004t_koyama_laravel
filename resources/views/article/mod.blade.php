@extends('parent')
@section('title', '記事')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(!empty($qulove->title))
@csrf
<button id="{{ $article->title }}" name="{{ $article->title }}" value="{{ $article->title }}">&#9829;</button>
@else
@csrf
<button id="{{ $article->title }}" name="{{ $article->title }}" value="{{ $article->title }}">&#9825;</button>
@endif

<h1>{{ $article->title }}</h1>
<br>
<h2>{{ $article->story }}</h2>
<br>
@if(!empty($article->image1))
<img src=" {{ asset('storage/images/'.$article->image1) }}">
@endif
@if(!empty($article->image2))
<img src=" {{ asset('storage/images/'.$article->image2) }}">
@endif
<hr size='3' color="#a9a9a9" width="450" align="left">
@if(session('id') === $article->idd)
<a href="{{ route('Article.edit', ['edit_title' => $article->edit_title]) }}">編集</a>
<a href="{{ route('Article.delete', ['edit_title' => $article->edit_title]) }}">削除</a>
@endif
<br>
<a href="{{ route('Article.list') }}">スレッド一覧</a>

<form method="POST" action="{{ route('Article.store') }}">
@csrf
    <br>
    <input type="hidden" name="idd" value="{{ $article->idd }}"><br>
    <input type="hidden" name="title" value="{{ $article->id }}"><br>
    <input type="hidden" name="edit_title" value="{{ $article->edit_title }}"><br>
    <input type="hidden" name="edit_story" value="{{ $article->edit_story }}"><br>
    <input type="hidden" name="delete_coment" value="0"><br>
    <textarea name="coment" placeholder="本文"></textarea><br>
    <input type="submit" value="コメント投稿">
</form>
@foreach($article2 as $article2)
<br>
{{ $article2->idd }}/{{ $article2->created_at }}
<br>
<p>{!! nl2br(e($article2->coment)) !!}</p>
@if(session('id') === $article2->idd)
<a href="{{ route('Article.edit2', ['id' => $article2->id]) }}">編集</a>
<a href="{{ route('Article.delete2', ['id' => $article2->id]) }}">削除</a>
@endif
<a href="{{ route('Article.forcoment', ['id' => $article2->id]) }}">返信</a>
<hr size='3' color="#a9a9a9" width="350" align="left">
@endforeach
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $('button').click(function(){
  console.log($('#'+this.id).html());
  if($('#'+this.id).html() === "♡"){
    $('#'+this.id).html("♥");
  }else if($('#'+this.id).html() === "♥"){
    $('#'+this.id).html("♡");
  }
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: '{{ route('loveer') }}',
    type:'GET',
    data:{
        'data':this.id,
        'id':'{{ $article->id }}'
    }
  })
  .then((res) => {
      console.log(res);
    })
});
</script>
@endsection