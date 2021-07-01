@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->
<div>

    <div class="container" style=" justify-content:center; align-items:center">
        <!-- Display Validation Errors -->
        <ul>
            @foreach($allTasks as $task)

            <li>

                <div  style="display:flex">
                    {{ $task->name}}

                
                    <div stye="justify-content:flex-end">

                        <a href="{{ route('tasks.edit',['task' => $task['id']]) }}" class="btn btn-secondary" style="margin-bottom: 20px;"><i class="bi bi-pencil-square"></i>


                        </a>

                        <form style="display:inline" method="POST" action="{{route('tasks.destroy',['task' => $task['id']])}}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit" style="margin-bottom: 20px;"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </div>
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
                <div class="text-center" style="display:flex; justify-content:center; align-items:center">
                    {{$allTasks->links("pagination::bootstrap-4")}}

                </div>

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div style="display:flex">
                    <div class="col-sm-6">
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <span style="font-size:15px"><i class="bi bi-plus-square"></i> </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- TODO: Current Tasks -->
@endsection