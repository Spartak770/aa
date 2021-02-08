<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function signIn(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validated)){
            return redirect()->route('profile');
        }else{
           return redirect()->route('/login')->with('error','Invalid email or password');
        }

    }

    public function profile()
    {
        $user = Auth::user();


        return view('profile',[
            'user' => Auth::user()
        ]);
    }

    public function registr(){
        return view('signup');



    }
    public function signUp(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:16',
            'email' => 'required|unique:users,email',
            'age' => 'required|numeric|max:100',
            'password' => 'required|min:6',
        ]);
    $validated['password'] = bcrypt($validated['password']); //* kodavorum enq password@*/
    $user = User::create($validated);
//    dd($user);
        return redirect()->route('/login');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('/login');
    }
}
