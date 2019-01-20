@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-8 blog-main">
            <div>
                <strong>Tag:</strong>
                @foreach($post->tags as $tag)
                    <a href="{{route('tagPage', $tag->name)}}" class="label label-info">{{ $tag->name }}</a>
                @endforeach
            </div>
            <div class="blog-post">
                <h2 class="blog-post-title">{{$post->title}}</h2>
                <p>{{$post->body}}</p>
            </div>
            <h4>Display Comments</h4>
            @include('partials.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
            <hr />
            <h4>Add comment</h4>
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment_body" class="form-control" required/>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Add Comment" />
                </div>
            </form>
        </div>
    </div>
@endsection
