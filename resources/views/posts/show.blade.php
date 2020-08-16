@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go back </a> <br>
    <h3> {!! $post->title!!}</h3>
    <div> {!!$post->body!!} </div>
    <small> written on {{ $post->created_at}} </small><br><hr>
    
    <a href="/posts/{{ $post->id}}/edit" class="btn btn-default">Edit Post</a>
    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'float-right']) !!}
        {{-- {{ Form::hidden('__method','DELETE')}} --}}
        {{ Form::submit('Delete Post', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection