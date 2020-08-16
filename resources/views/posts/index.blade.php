@extends('layouts.app')


@section('content')
    <h3>Posts</h3>
        @if(count($posts) > 0)
           <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img src="storage/cover_images/{{$post->cover_image}}" alt="img" style="width: 50%">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3> {{ $post->title}} </h3>
                                    <small> written on {{ $post->created_at}} by {{ $post->user->name }}</small><br><hr>
                                    <a href="/posts/{{$post->id}}">view post</a>
                                </div>
                            </div>
                        </div>
                    </li><br>
                @endforeach
                {{ $posts->links()}}
           </ul>
        @else
            <p> No Posts</p>
        @endif
@endsection