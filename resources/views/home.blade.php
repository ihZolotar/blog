@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">Publish a post:</div>
                <form action="{{route('post')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control" type="text" name="title" id="title">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                    </div>
                    <div class="form-group">
                        <label for="alias">Alias:</label>
                        <input class="form-control" type="text" name="alias" id="alias">
                    </div>
                    <div class="form-group">
                        <label for="intro">Intro:</label>
                        <textarea class="form-control" type="text" name="intro" id="intro"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" type="text" name="body" id="body"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag:</label>
                        <input class="form-control" type="text" name="tag" id="tag">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Post</button>
                    </div>
                    @include('layouts.error')
                </form>
            </div>
        </div>
    </div>
@endsection
