<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
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
}
