<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .task-done {
            text-decoration: line-through;
            background-color: red;
            opacity: .5;
        }
    </style>
</head>
<body>



    <div class="container mt-4">
        <h1>To-Do List</h1>

        <form action={{route('tasks.store')}} method="post" class="mt-4">
            @csrf
            <div class="input-group">
                <input type="text" name="task" class="form-control" placeholder="Enter a task">
                <input type="color" name="theme">
                <div class=" input-group-append">
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </div>
        </form>
        <ul class="list-group mt-4">
            @foreach ($tasks as $task)
                <div class="p-3 lista  mb-5" style="background-color: #eee">
                    <li class="mb-3 list-group-item {{ $task->status ? 'task-done' : '' }}" style="background-color: {{$task->theme}}">{{ $task->task }}</li>

                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('tasks.update', $task->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="checkbox" name="status" id="status_{{$task->id}}" onchange="this.form.submit()" {{ $task->status ? 'checked' : '' }} >
                            {{-- <label for="status" style="margin-left: 10px;" class="{{ $task->status ? 'task-done' : '' }}">{{ $task->task }}</label> --}}

                        </form>
                        <label for="status_{{$task->id}}">Done Task</label>
                    </div>

                    <div class="col-md-3">
                        <a class="btn btn-sm btn-primary" href="{{ route('tasks.edit', $task->id)  }}">Edit</a>
                    </div>
                    <div class="col-md-3">
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger">delete</button>
                    </form>
                    </div>


                </div>
                </div>
            @endforeach
        </ul>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
