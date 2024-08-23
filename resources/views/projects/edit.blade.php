@extends('layouts.layout')

@section('content')

<div class="d-flex justify-content-end align-items-center my-4">
    <a href="{{ route('projects.index') }}" class="btn btn-primary">View Projects</a>
</div>

<h2 class="my-4">Edit Project</h2>

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Project Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
        </div>

        <div class="mb3">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Active" {{ $project->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $project->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
