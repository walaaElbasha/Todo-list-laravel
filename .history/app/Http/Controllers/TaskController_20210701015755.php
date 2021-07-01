<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;


class TaskController extends Controller

{

    public function index()
    {
        $allTasks = Task::all();

        return view('tasks.index', [
            'tasks' => $allTasks
        ]);
    }


    public function store(TaskRequest $request)
    {


        $requestData = $request->all();


        Task::create($requestData);


        //another syntax
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();

        return redirect()->route('tasks.index');
    }

}