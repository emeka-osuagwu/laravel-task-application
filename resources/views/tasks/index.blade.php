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
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Task Name">
                </div>
                <div class="col-md-2">
                    <select name="priority" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="project_id" class="form-control">
                        <option value="">Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </div>
        </form>
        <ul class="list-group">
            @forelse ($tasks as $task)
                <li class="list-group-item">
                    {{ $task->name }} 
                    <span class="badge badge-secondary float-right">Priority: {{ $task->priority }}</span>
                </li>
            @empty
                <li class="list-group-item">No tasks found.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
