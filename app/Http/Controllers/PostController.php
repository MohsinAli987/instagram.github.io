<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\RetryMiddleware;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->Middleware('auth');
    }


    public function indexShowPost()
    {
        $authuser = auth()->user();

        $users = auth()->user()->following()->pluck('Profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);

        return view('Posts.index', compact('posts' , 'authuser'));
    }

    public function CreatePost()
    {
        return view('Posts.CreatePost');
    }

    public function StorePost()
    {
        $data = request()->validate([

            'caption' => 'required',

            'image' => ['required', 'image'],

        ]);

        $ImagePath = request('image')->store('upload', 'public');

        $image = Image::make(public_path("storage/{$ImagePath}"))->fit(1200, 1200);

        $image->save();

        auth()->user()->posts()->create([

            'caption' => $data['caption'],

            'image' => $ImagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }


    public function PostShow(Post $post)
    {
        return view('Posts.ShowPosts', compact('post'));
    }
}
