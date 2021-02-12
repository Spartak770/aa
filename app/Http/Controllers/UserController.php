<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserSignInRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('profile');
        }else{
            return view('login');
        }
    }
    public function index(){

        $arr =  [
            [
                'id'=>1,
                'first_name'=>'John',
                'last_name'=>'Doe',
                'age'=>21
            ],
            [
                'id'=>2,
                'first_name'=>'Artur',
                'last_name'=>'Smith',
                'age'=>18
            ],
            [
                'id'=>3,
                'first_name'=>'Sara',
                'last_name'=>'Paterson',
                'age'=>26
            ]
        ];
        return view('welcome',[
            'users' => $arr
        ]);
    }

    public function signIn(UserSignInRequest $request){
        $validated = $request->validated();

        if(Auth::attempt($validated)){
            return redirect()->route('profile');
        }else{
           return redirect()->route('login')->with('error','Invalid email or password');
        }

    }

    public function profile()
    {
        // $user = Auth::user();
        $posts = Post::where('user_id',Auth::user()->id)->with('user')->get();
        // dd($posts);
        $user = User::first();


        return view('profile',[
            'user' => Auth::user(),
            'posts'=>$posts
        ]);
    }

    public function registr(){
        return view('signup');

    }
    public function signUp(UserRegisterRequest $request){
        $validated = $request->validated();

    $user = User::create($request->validated());
//    dd($user);
        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function edit(){
        return view('user-edit',[
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|min:3|max:16',
            'password' => 'nullable|min:6',
            'image' => 'nullable|image|max:2048'
        ]);

        $validated = array_filter($validated, function($value){
            return !empty($value);
        });

        Auth::user()->update($validated);
        if($request->hasFile('image')){
            $imageName = $request->file('image')->store('images');

            Auth::user()->profile_image = $imageName;
            Auth::user()->save();
        }


        return redirect()->route('profile');

    }




}
