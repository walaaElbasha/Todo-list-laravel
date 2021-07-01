@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->
<div style="background-image: url('sticky.jpg')">

    <div class="container">
        <!-- Display Validation Errors -->
        <ul>
            @foreach($allTasks as $task)

            <li>
                <div class="row" style="display:flex;">
                    <div class="col-6">
                        {{ $task->name}}



                        <div class="col-6" stye="justify-content:flex-end float:right">

                            <a href="{{ route('tasks.edit',['task' => $task['id']]) }}" class="btn btn-secondary" style="margin-bottom: 20px;"><i class="bi bi-pencil-square"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-aspect-ratio-fill" viewBox="0 0 16 16">
                                    <path d="M0 12.5v-9A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5zM2.5 4a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 1 0V5h2.5a.5.5 0 0 0 0-1h-3zm11 8a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-1 0V11h-2.5a.5.5 0 0 0 0 1h3z" />
                                </svg>

                            </a>

                            <form style="display:inline" method="POST" action="{{route('tasks.destroy',['task' => $task['id']])}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit" style="margin-bottom: 20px;"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                        <br>
            </li>
            @endforeach
        </ul>
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
</div>


<div class="text-center">
    {{$allTasks->links("pagination::bootstrap-4")}}

</div>
<!-- TODO: Current Tasks -->
@endsection