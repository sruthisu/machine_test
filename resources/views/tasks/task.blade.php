@extends('layouts.layout')

@section('content')


<div class="d-flex justify-content-between align-items-center my-4">
    
    <a href="{{ route('projects.index') }}" class="btn btn-primary">Manage Projects</a>
    <a href="{{ route('time_entries.timeentry') }}" class="btn btn-primary">Time Entry</a>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-light">
    <tr>
    <th colspan="6" class="text-center">Manage Tasks</th>
    </tr>
        <tr>
            <th>SNo</th>
            <th>Project Name</th>
            <th>Task Name</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $task->project->name }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->status }}</td>
            <td>
            <a href="{{ route('tasks.edit_task', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
            <td>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
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
