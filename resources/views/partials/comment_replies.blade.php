@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        @if($comment->user->id == Auth::user()->id)
        <form action="{{route('commentDestroy', $comment->id)}}" method="post">
            {{csrf_field()}}
            {!! method_field('delete') !!}
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
        @endif
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" required/>
                <input type="hidden" name="post_id" value="{{ $post_id }}"/>
                <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply"/>
            </div>
        </form>
        @include('partials.comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach