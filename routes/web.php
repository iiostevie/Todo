<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // all()
use Illuminate\Support\Facades\Auth;


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

// Display all tasks
Route::get('/', function () {

    // Incremental Order
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('task', [
        'tasks' => $tasks
    ]);
});// ->middleware('auth');

// Create new task
Route::post('/task',function(Request $request){
    $validator = Validator::make($request->all(),[
        'description' => 'required|max:255'
    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);

    }

    $task = new Task;
    $task->description = $request->description;
    $task->save();

    return redirect('/');
});

// Update status






// Delete an existing tasks

Route::delete('/task/{id}', function($id){
    Task::findOrFail($id)->delete();

    return redirect('/');
});

Route::post('task/{id}/completed',function($id){
   // $task = Task::find($id)
    return redirect('/');
});



// Register pages
Route::get('/register',function(){
    return view('user');
});

// Only authenticated user can post the new user
Route::post('/register',
    function(Request $request ){
   // dd($request->input('email'));
        //dd(bcrypt('pass'));

    // 按下註冊鍵
     if($request->input('register')){
         $user = new User;
         $user->name = $request->name;
         $user->email = $request->email;
         //$user->password = Hash::make($request->password);           // Hash the password
         $user->password = bcrypt($request->password);             // The other way to has the password
         $user->save();
     }

    // 按下登入鍵

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //auth::login($request->usermail);
            //dd(auth()->user());
            dd(session()->all());
        }

        /*
    auth::login($request->input('email') );

     if($request->input('login')){
         $usermail = $request->email;
         $userpass = $request->password;


     }

        */



    return redirect('/register');
});
