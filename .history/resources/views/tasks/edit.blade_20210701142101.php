@extends('layouts.app')

@section('title')edit Page @endsection

@section('content')
<div class="container" style="padding-top:40px">
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
        <div style="display:flex; justify-content:center; align-items:center">
            <div class="form-group">
                <label for="title">Task</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $task->name}}">
            </div>


            <button type="submit" class="btn btn-info">Update <i class="bi bi-check-lg"></i></button>
    </form>
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

</div>
@endsection