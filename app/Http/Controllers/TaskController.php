<?php

namespace App\Http\Controllers;
use App\Models\Project; 
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
    
        $tasks = Task::with('project')->get();

        return view('tasks.task', compact('tasks'));
    }

    public function edit($id)
{
    $task = Task::findOrFail($id);
    $projects = Project::all(); 
    return view('tasks.edit_task', compact('task', 'projects'));
}

public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $task->update($request->all());
    return redirect()->route('tasks.task')->with('success', 'Task updated successfully.');
}


    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.task')->with('success', 'Task deleted successfully.');
    }
}
