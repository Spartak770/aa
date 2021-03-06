<?php

namespace App\Http\Controllers;

use App\Constants\ClientResponse;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserSignInRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Services\UserService;
use Illuminate\Support\Facades\Http;




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



        $userService = new UserService(Auth::user());
        $userService->update($validated);
        // dd($validated);

            // $imageName = $request->file('image')->store('images');




        return redirect()->route('profile');

    }

    public function  getProfileImage()
    {

        return response()->file(Storage::path(Auth::user()->profile_image));

    }

    public function apiStore(UserRegisterRequest $request){
        $user = User::create($request->validated());

        return response()->json([
            'status' => ClientResponse::STATUSES['success'],
            'data' =>$user
        ]);
    }

    public function apiReturn(){
        return response()->json([
            User::all()
        ]);
    }

    public function getUser($userId){
        return response()->json([
            'status' => ClientResponse::STATUSES['success'],
            'data'=> User::find($userId),
        ]);

    }

    public function apiLogin(Request $request){
        $response = Http::asForm()->post(env('APP_URL').'/oauth/token',[
            'grant_tipe' => 'password',
            'client_id' => env('PASSPORT_PASSWORD_ID'),
            'client_secret' => env('PASSPORT_PASSWORD_SECRET'),
            'username'=> $request->email,
            'password'=> $request->password,
            'scope'=>'',
        ]);
        return $response->json();
    }
}
