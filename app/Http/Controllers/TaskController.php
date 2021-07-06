<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        session()->flash('success', 'Todo created successfully');
        return redirect('listtask');
    }
    
}
