<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class TaskController extends Controller
{
    public function create(Request $request){
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
    }
}
