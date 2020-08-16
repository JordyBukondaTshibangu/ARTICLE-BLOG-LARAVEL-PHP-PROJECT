<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
   public function __construct(){
       $this->middleware('auth', ['except' => ['index','show']]);
   }

    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts',$posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasfile('cover_image')) {

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success','Post created');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return view('/posts')->with('error', 'Unauthorized');
        }
        return view('posts.edit')->with('post',$post);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        if ($request->hasfile('cover_image')) {

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            
        } 

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->hasfile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts')->with('success','Post updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return view('/posts')->with('error', 'Unauthorized');
        }

        if($post->cover_image !== 'noimage.png'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success','Post removed');
    }
}
