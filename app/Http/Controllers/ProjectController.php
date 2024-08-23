<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
    
        $projects = Project::all();
        
        return view('projects.index', compact('projects'));
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);
        $project->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}

