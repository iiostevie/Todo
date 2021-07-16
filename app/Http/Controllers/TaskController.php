<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // create a new task

        $request->user()->tasks()->create([
            'description' => $request->description,
        ]);

        return redirect()->route("table",['user'=>\Auth::user()]);

    }

    public function index(Request $request){
        $tasks = Task::where('userid',\Auth::id())
                -> orderBy('created_at', 'asc')
                ->get();
        return view('task',['tasks' => $tasks,'user'=>\Auth::user()]);
    }

    public function destroy(Request $request){
        Task::findOrFail($request->id)->delete();
        return redirect()->route("table",['user'=>\Auth::user()]);
    }
}
