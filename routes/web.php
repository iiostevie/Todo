<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // all()

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
});

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


