<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // all()
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('task', [
        'tasks' => $tasks
    ]);
});


// Display all tasks
Route::post('/task',function (Request $request) {
    $validator = Validator::make($request->all(),[
        'name' => 'required|max:255'
    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);

    }
    //create task

    $task = new Task;
    $task->id = $request->id;
    $task->save();

    return redirect('/');
});


// Delete an existing tasks

Route::delete('/task/{id}', function($id){

    return redirect('/');
});


