<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use task model
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::where("iscompleted", false)->orderBy("id", "DESC")->get();
        $c_tasks = Task::where("iscompleted", true)->get();
        return response()->json([
            'tasks' => $tasks,
            'c_tasks' => $c_tasks
        ]);
    }


    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json([
            'code' => 200,
            "message" => "Task added successfully"
        ]);
    }

    //complete
    public function complete($id)
    {
        $task = Task::find($id);
        $task->iscomplete = true;
        $task->save();
        return response()->json([
            'code' => 200,
            'message' => 'Task listed as complete.'
    ]);

    }

    //destroy
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json([
            'code'=>200,
            'message'=> 'Task deleted.'
    ]);
    }
}
