@extends('layouts.app')


@section('content')
    <h3>Posts</h3>
        @if(count($posts) > 0)
           <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item">
                        <div class="well">
                            <h3> {{ $post->title}} </h3>
                            <small> written on {{ $post->created_at}} by {{ $post->user->name }}</small><br><hr>
                            <a href="/posts/{{$post->id}}">view post</a>
                        </div>
                    </li><br>
                @endforeach
                {{ $posts->links()}}
           </ul>
        @else
            <p> No Posts</p>
        @endif
@endsection