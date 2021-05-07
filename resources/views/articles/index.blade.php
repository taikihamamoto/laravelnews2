@extends('articles.layout')
@section('contents')
<section class="form-post">
    <h2 class="comment-header">さぁ、最新のニュースをシェアしましょう！</h2>
    <ul class="error_message">
        @if ($errors->has('title'))
        <li>{{{$errors->first('title')}}}</li>
        @endif
        @if ($errors->has('text'))
        <li>{{{$errors->first('text')}}}</li>
        @endif
    </ul>
    <form id="formPost" method="POST" action="{{route('Articlestore')}}" onsubmit="return submitChk()">
        @csrf
        <div class="input-title">
            <label for="title">タイトル：</label>
            <input name="title" type="text" value="">
        </div>
        <div class="input-body">
            <label for="body">記事：</label>
            <textarea name="text" cols="50" rows="10" value=""></textarea>
        </div>
        <div class="input-submit">
            <input class="btn-submit" type="submit" name="send" value="投稿">
        </div>
    </form>
</section>
<section class="posts">
    @foreach($article as $article)
    <div class="post">
        <h3 class="post-title">{{{$article->title}}}</h3>
        <p class="post-body">{{{$article->text}}}</p>
        <a href="/comment/{{$article->id}}">記事全文・コメントを見る</a>
        <form  class="deleteArticle" method="POST" action="{{ route('Articledelete',$article->id) }}" onsubmit="return deleteChk()">
        @csrf
        <input class="deleteArticlebtn" type="submit" name="deleteSend" value="削除する">
        </form>
    </div>
</section>
@endforeach
@endsection