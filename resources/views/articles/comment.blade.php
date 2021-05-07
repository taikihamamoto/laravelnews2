@extends('articles.layout')
@section('contents')
<ul class="error_message">
    @if ($errors->has('text'))
    <li>{{{$errors->first('text')}}}</li>
    @endif
</ul>
<section class="post-detail">
    <h3 class="post-title">{{{ $article->title }}}</h3>
    <p class="post-body">{{{ $article->text }}}</p>


</section>
<hr>
<section class="comments">
    <div class="form-comment">
        <form method="POST" action="{{route('Commentstore')}}">
            @csrf
            <div class="input-body">
                <input type="hidden" name="news_id" value="{{ $article->id }}">
                <textarea name="text" class="post-it post-it-red"></textarea>
                <input class="btn-submit" type="submit" name="commentSend" value="コメントを書く">
            </div>
        </form>
    </div>
    </form>
    </div>
    @foreach($comment as $comment)
    @if( $comment->news_id == $article->id )
    <div class="commentContent">
        {{{ $comment->text }}}
        <form method="POST" action="{{ route('Commentdelete',$comment->id) }}">
            @csrf
            <input class="deleteComment" type="submit" name="deleteSend" value="コメントを消す">
        </form>
    </div>
    @endif
    @endforeach
</section>
@endsection