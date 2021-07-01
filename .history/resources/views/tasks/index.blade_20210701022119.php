@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->

    @foreach($allTasks as $task)
    <tr>
        <th scope="row">{{ $task->name}}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
        <td>{{ \Carbon\Carbon::parse( $post->created_at,'d/m/Y H:i:s')->isoFormat('Y-m-d') }}</td>

        <td>
            
            <a href="{{ route('posts.edit',['post' => $post['id']]) }}" class="btn btn-secondary" style="margin-bottom: 20px;">Edit</a>

            <form style="display:inline" method="POST" action="{{route('posts.destroy',['post' => $post['id']])}}">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit" style="margin-bottom: 20px;">Delete</button>
        <td> {{$post->slug}} </td>
        </form>
        </td>
    </tr>

    @endforeach
    <!-- New Task Form -->
    <form action="{{ url('tasks.store') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
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