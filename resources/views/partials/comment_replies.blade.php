@foreach($comments as $comment)
    <!-- Comment with nested comments -->
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">{{ $comment->user->name }}</h5>
            <p>{{ $comment->body }}</p>
                @auth
                    @if($comment->user->id == Auth::user()->id)
                        <form action="{{route('commentDestroy', $comment->id)}}" method="post">
                            {{csrf_field()}}
                            {!! method_field('delete') !!}
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    @endif
                @endauth
            <br>
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
    </div>
@endforeach