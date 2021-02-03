<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
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
        dd($request->all());
    }

    public function registr(){
        return view('signup');
    }
    public function signUp(Request $request){
    $data = $request->only('name','email','age','password'); /*stanum enq konkret */
    $data['password'] = bcrypt($data['password']); //* kodavorum enq password@*/
    $user = User::create($data);
//    dd($user);
        return redirect('/login');
    }
}
