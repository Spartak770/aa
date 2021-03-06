<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;
use \App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserAuth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


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


Route::get('/', [UserController::class, 'index']); // UserController login funkcian

Route::get('/login', [UserController::class, 'login'])->name('login'); // UserController login funkcian
Route::post('/login', [UserController::class, 'signIn'])->name('post-login'); // UserController login funkcian

Route::get('/signup', [UserController::class, 'registr'])->name('signup');
Route::post('/signup', [UserController::class, 'signUp']);

Route::group(['middleware' => ['checkUserAuth']], function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('posts', [PostController::class, 'create'])->name('post-create');
    Route::post('posts', [PostController::class, 'store'])->name('store-posts');
    Route::get('me/edit',[UserController::class, 'edit'])->name('user.edit');
    Route::post('me/edit', [UserController::class, 'update'])->name('user.update');
    Route::get('me/profile_image', [UserController::class,'getProfileImage'])->name('user.profile-image');

});


// Route::get('/test', function () {

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
    // $count = User::paginate(4); // 4 հատն ենք ստանում
    //    $count = User::where('age','>',10)->count();
    //    $user = User::where('id',4)->first();  Or User::find(4) /*id a man galis*/
    $users = User::find([1, 5, 7]); // 1,5,7 id ով յուզեռներին ենք ստանում
    //    $user =  User::where('id','>','5')->orderBy('first_name', 'desc')->take(10)->get(); //10 հատը
    // dump($users);
// });

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



// Route::get('test', function(){
//         baza avelacnel stanal update xmbov stanal
//         Eloquent class nayeel laraveli docum
// });
