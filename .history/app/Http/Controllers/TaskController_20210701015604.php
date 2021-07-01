<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;


class TaskController extends Controller

{


    public function show($taskId)
    {
        $task = Task::find($taskId); 

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function store(TaskRequest $request)
    {


        // $requestData = request()->all();

        //another syntax
        // $title = request()->title;
        // $description = request()->description;

        $requestData = $request->all();

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        // ]);

        Post::create($requestData);


        //another syntax
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();

        return redirect()->route('posts.index');
    }

}
