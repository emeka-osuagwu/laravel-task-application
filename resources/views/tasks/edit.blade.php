<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <!-- Bootstrap CSS via CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" class="form-control">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ $task->priority == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="project">Project</label>
                <select name="project_id" id="project" class="form-control">
                    <option value="">Select Project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Add more fields as needed -->
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTaskModal{{ $task->id }}">Edit</button>

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>

    <div class="modal fade" id="editTaskModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel{{ $task->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="editTaskModalLabel{{ $task->id }}">Edit Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <!-- Edit Task Form -->
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Task Name Field -->
                                <div class="form-group">
                                    <label for="name">Task Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
                                </div>
                                <!-- Priority Field -->
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="text" name="priority" id="priority" class="form-control" value="{{ $task->priority }}">
                                </div>
                                <!-- Add more fields as needed -->
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update Task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>
