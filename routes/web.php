<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;
use \App\Http\Controllers\UserController;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',[UserController::class,'index']); // UserController login funkcian

Route::get('/login',[UserController::class,'login']); // UserController login funkcian
Route::post('/login',[UserController::class,'signIn']); // UserController login funkcian

Route::get('/signup',[UserController::class,'registr']);
Route::post('/signup',[UserController::class,'signUp']);

Route::get('/test',function (){

//   $users = User::first();/*arajin@*/
//   $users = User::get();/*sax*/
//    $users = User::where('age',10)->first();/* arjin hamapatasxan@*/
//    $users = User::where('age','>',9)->get(); User::whereAge(35)->first()/* Age i poxaren inch uzenq kgrenq */
//        $users = User::where('age',35)->select(['email'])->get(); /*menak emal enq stanum*/
//   $users  = User::orderBy('age','asc')->get();/* dasavorum a */
//    dump($users);

//    foreach ($users as $user){
//        dump($user->email);
//    }

//    $users = User::limit(2)->get();/*limit*/
//    $users = User::limit(2)->offset(5)->get();/*10 hat@ vercra 5@ bac tox*/
//    $users = User::limit(2)->skip(5)->get();/*10 hat@ vercra 5@ bac tox*/
//    $users = User::groupBy('name')->get();
//    $count = User::count(); // ստանում ենք քանակը
    $count = User::paginate(4); // 4 հատն ենք ստանում
//    $count = User::where('age','>',10)->count();
//    $user = User::where('id',4)->first();  Or User::find(4) /*id a man galis*/
    $users =User::find([1,5,7]); // 1,5,7 id ով յուզեռներին ենք ստանում
//    $user =  User::where('id','>','5')->orderBy('first_name', 'desc')->take(10)->get(); //10 հատը
    dump($users);
});

//Route::post('/signup',[UserController::class,'signUp']);

//Route::get('/login','UserController@login');
//Route::get('/login',function (){
//    $a= 5;
//    $b = 6;
//    $c= $a+$b;
////    return view('login');
//    return view('login',[
//        'c'=> $c
//    ]);
//});

//Route::post('/login',function (Request $reqsuet){
////    dd($reqsuet->all());
////    dd($reqsuet->email);
//    dd($reqsuet->get('email'));
////    return view('login');
////    return 'hello';
////    return view('/')
//});

//Route::get('user/{id}/sad',function ($id){
//    dd($id);
//});
