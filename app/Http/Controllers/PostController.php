<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts');
    }

    public function store(Request $request){

        $validated =$request->validate([
            'data' => 'required|min:1|max:256'
        ]);

        $validated['user_id'] = Auth::user()->id;

        $post = Post::create($validated);

        return redirect()->route('profile');

    }

    public function apiUpdate(Post $posts)
    {
        $u = User::first();
        Auth::login($u);
        // dd(Auth::user());

        $posts->likes()->syncWithoutDetaching(Auth::user()->id);

        return response()->json([
            'status' => 1
        ]);
    }

    public function apiGetLikes(Post $posts)
    {
        $u = User::first();
        Auth::login($u);

        $posts->load('likes');

        $emails = $posts->likes->pluck('emial');



        return response()->json([
            'status' => 1,
            'data' => [
                'count' => $posts->likes->count(),
                'users' => $emails
            ]
        ]);
    }
}
