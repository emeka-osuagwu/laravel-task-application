<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS via CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Task Manager</h1>
        <form action="{{ route('tasks.create') }}" method="POST" class="mb-4">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Task Name">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-2">
            <select name="priority" class="form-control @error('priority') is-invalid @enderror">
                <option value="">Select Priority</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            @error('priority')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <select name="project_id" class="form-control @error('project_id') is-invalid @enderror">
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
</form>


        <ul class="list-group">
    @forelse ($tasks as $task)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $task->name }} 
                    <span class="badge badge-secondary ml-2">Priority: {{ $task->priority }}</span>
                    @if($task->project)
                        <span style="margin-top: 4px, margin-left: 10px" class="badge badge-primary">{{$task->project->name}}</span>
                    @endif
                </div>
                <div>
                    <form action="{{ route('tasks.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </li>
    @empty
        <li class="list-group-item">No tasks found.</li>
    @endforelse
</ul>
    </div>
</body>
</html>
