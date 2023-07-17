<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>




<div class="container mt-5">
    <h1>edite</h1>
    <form action={{route('tasks.update', $task->id)}} method="post" class="mt-4">
        @csrf
        @method('put')
        <div class="input-group">
            <input type="text" name="task" class="form-control" placeholder="Enter a task" value="{{ $task->task }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Update Task</button>
            </div>
        </div>
    </form>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

