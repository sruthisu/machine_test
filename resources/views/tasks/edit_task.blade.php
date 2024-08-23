@extends('layouts.layout')

@section('content')
<div class="d-flex justify-content-end align-items-center my-4">
    <a href="{{ route('tasks.task') }}" class="btn btn-primary">View Tasks</a>
</div>

<h2 class="my-4">Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name">Task Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
        </div>

        <div class="mb-3">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Active" {{ $task->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $task->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
