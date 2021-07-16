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
Route::get('/auth/{user}/tasks',[\App\Http\Controllers\TaskController::class, 'index'])->name("table");

// Create new task
Route::post('/auth/{user}/tasks','App\Http\Controllers\TaskController@store');


// Update status


// Delete an existing tasks
/*
Route::delete('/auth/{user}/tasks/{id}', function($user, $id){
    Task::findOrFail($id)->delete();

    return redirect('/auth/{user}/tasks');
});

*/

Route::delete('/auth/{user}/tasks/{id}','App\Http\Controllers\TaskController@destroy');




// Register pages
Route::get('/',function(){
    return view('user');
});

// Only authenticated user can post the new user
Route::post('/', function(Request $request ){
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $id = \Auth::id();
        return redirect("/auth/{$id}/tasks");
    }
    else{
        view('Common.Errors');
    }
    return redirect('/');
})->name('login');
