@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-info">Go back </a> <br> <br>
    <h3> {!! $post->title!!}</h3>
    <br>
    <img src="{{ asset('/storage/cover_images/'.$post->cover_image) }}" alt="/" style="width: 50%">
    {{-- <img src="storage/cover_images/{{$post->cover_image}}" alt="img" > --}}
    <hr>
    <div> {!!$post->body!!} </div>
    <small> written on {{ $post->created_at}} by {{ $post->user->name }}</small>
    <br><hr>
    
@if (!Auth::guest())
   @if (Auth::user()->id == $post->user_id)
        <a href="/posts/{{ $post->id}}/edit" class="btn btn-default">Edit Post</a>
        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'float-right']) !!}
            {{ Form::submit('Delete Post', ['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
   @endif
@endif
@endsection