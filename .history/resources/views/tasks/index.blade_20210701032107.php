@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="container">
    <!-- Display Validation Errors -->

    @foreach($allTasks as $task)
    <tr>
        <th scope="row">{{ $task->name}}</th>

        <td>

            <a href="{{ route('tasks.edit',['task' => $task['id']]) }}" class="btn btn-secondary" style="margin-bottom: 20px;">Edit</a>

            <form style="display:inline" method="POST" action="{{route('tasks.destroy',['task' => $task['id']])}}">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit" style="margin-bottom: 20px;">Delete</button>
            </form>
        </td>
    </tr>
    <br>

    @endforeach
    <!-- New Task Form -->
    <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
        @csrf

        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Task
                </button>
            </div>
        </div>
    </form>
</div>



<!-- TODO: Current Tasks -->
@endsection