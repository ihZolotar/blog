@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4">Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- Blog Post -->
                @foreach($posts as $post)
                    <div class="card mb-4">
                        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">
                                <strong>Tag:</strong>
                                @foreach($post->tags as $tag)
                                    <a href="{{route('tagPage', $tag->name)}}"
                                       class="label label-info">{{ $tag->name }}</a>
                                @endforeach
                            </p>
                            <p>{{ $post->intro }}</p>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            {{--@auth--}}
                                {{--@if (Auth::user()->id == $post->user_id)--}}
                                    {{--<a class="btn btn-primary" href="/posts/{{$post->alias}}/edit">--}}
                                        {{--Редактировать--}}
                                    {{--</a>--}}
                                    {{--<form action="/posts/{{$post->alias}}" method="post">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--{!! method_field('delete') !!}--}}
                                        {{--<button type="submit" class="btn btn-danger">--}}
                                            {{--Удалить--}}
                                        {{--</button>--}}
                                    {{--</form>--}}
                                {{--@endif--}}
                            {{--@endauth--}}
                            {{--<a href="/posts/{{$post->alias}}" class="btn btn-primary">Read More--}}
                                {{--&rarr;--}}
                            {{--</a>--}}
                        </div>
                        <div class="card-footer text-muted">
                            Posted on January 1, 2017 by
                            <a href="#">Start Bootstrap</a>
                        </div>

                    </div>
            @endforeach
            <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        {{ $posts->render() }}
                    </li>
                </ul>
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature
                        the
                        new Bootstrap 4 card containers!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
