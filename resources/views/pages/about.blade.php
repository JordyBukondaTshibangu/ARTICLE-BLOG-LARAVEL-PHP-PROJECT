@extends('layouts.app')

    @section('content')
        <h1>About</h1>
        <h3 class="mt-5"> 
            This is a small blog article app created with the help of Laravel and its default blade template.
        </h3>
        <p>
            This app perfoms the full CRUD operation.
            It implements the default laravel authentication system.
            It gives you the ability to perfom the following : 
        </p>
        <ul>
            <li>Register</li>
            <li>Login</li>
            <li>Logout</li>
            <li>Create a Post</li>
            <li>View a single Post</li>
            <li>View all Posts</li>
            <li>Update Post</li>
            <li>Delete Post</li>
        </ul>
        <p>It also uses boostrap for its styling</p>
    @endsection
