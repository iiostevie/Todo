<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


// Display all tasks
Route::get('/task',function () {
    return view('task');
});

/*
// Add new task
Route::get('/task/add', function(Request $request){

});

// Delete an existing tasks

Route::get('/task/{id}/delete', function($id){

});

*/

