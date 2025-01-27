@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center my-4">
   
    <a href="{{ route('tasks.task') }}" class="btn btn-primary">Manage Tasks</a>
    <a href="{{ route('time_entries.timeentry') }}" class="btn btn-primary">Time Entry</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-light">
    <tr>
    <th colspan="5" class="text-center">Manage Projects</th>
    </tr>
    
        <tr>
            <th>SNo</th>
            <th>Project Name</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->status }}</td>
            <td>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
            <td>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection


