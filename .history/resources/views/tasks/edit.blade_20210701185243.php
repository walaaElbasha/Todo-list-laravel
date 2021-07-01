@extends('layouts.app')

@section('title')edit Page @endsection

@section('content')
<div class="container" style="padding-top:40px">
    <h1 style="
            background-color: rgb(246, 246, 246) ;
            margin-top: 30px;
            margin-bottom: 30px;
            padding-inline: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 28px;
            font-family: sans-serif;
            padding-left: 50px;
            
            
            ">
        Edit Task

        <!-- <form method="POST" action="{{route('tasks.update',['task'=> $task['id']])}}">
            @csrf
            <input type="hidden" name="_method" value="PUT"> -->
        <div style="display:flex; justify-content:center; align-items:center ">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <!-- <div class="form-group">
            <label for="title">Task</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $task->name}}">
        </div>


        <button type="submit" class="btn btn-info">Update <i class="bi bi-check-lg"></i></button>
    </form> -->

        <div style="display:flex; justify-content:center; align-items:center">
            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control" value="{{ $task->name}}">
            </div>

            <div class=" form-group">
                <div>
                    <!-- <button type="submit" class="btn btn-info">Update <i class="bi bi-check-lg"></i></button> -->

                    <button onclick="window.location="'{{route('tasks.update',['task'=> $task['id']])}}'"">Update <i class="bi bi-check-lg"></i></button>
                </div>
            </div>
        </div>
        <!-- @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->
    </h1>
</div>
@endsection