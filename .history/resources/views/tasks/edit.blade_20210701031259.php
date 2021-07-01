@extends('layouts.app')

@section('title')edit Page @endsection

@section('content')
<form method="POST" action="{{route('tasks.update',['task'=> $task['id']])}}">
    @csrf
    <input type="hidden" name="_method" value="PUT">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="title">Task</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="{{ $task->name}}">
    </div>


    <button type="submit" class="btn btn-primary">Update task</button>
</form>
<!-- @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->
@endsection