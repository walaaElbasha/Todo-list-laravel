@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->


@if($errors->any())
<div class="alert alert-danger w-25">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($success!=null)
<div class="alert alert-success w-25">
    {{$success}}
</div>
@endif



<body style="background-image: url('sticky.jpg')  ; background-repeat: no-repeat;
  background-size: 1400px 950px;">

    <div class="container">

        <!-- Display Validation Errors -->

        <div style="margin-top:154px; margin-left:210px">
            <table>
                <ul>
                    @foreach($allTasks as $task)


                    <tr>
                        <td style="width:590px">
                            <div style="display:flex">
                                <!-- <div style="justify-content:flex-start"> -->
                                <li>
                                    {{ $task->name}}

                                </li>
                        </td>
                        <td>
                            <!-- </div> -->
                            <div style="justify-content:flex-end">

                                <a href="{{ route('tasks.edit',['task' => $task['id']]) }}" class="btn btn-secondary mt-4"><i class="bi bi-pencil-square"></i>


                                </a>

                                <form style="display:inline" method="POST" action="{{route('tasks.destroy',['task' => $task['id']])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger mt-4" type="submit"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
        </div>
        <br>
        </td>

        </tr>


        @endforeach
        </ul>
        </table>
        <!-- New Task Form -->
    </div>
    <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
        @csrf

        <!-- Task Name -->
        <div class="form-group">
            <div class="text-center" style="display:flex; justify-content:center; align-items:center">
                {{$allTasks->links("pagination::bootstrap-4")}}

            </div>

            <div style="display:flex; justify-content:center; align-items:center">
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success mt-3">
                            <span style="font-size:15px"><i class="bi bi-plus-square"></i> </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>


<!-- TODO: Current Tasks -->
@endsection