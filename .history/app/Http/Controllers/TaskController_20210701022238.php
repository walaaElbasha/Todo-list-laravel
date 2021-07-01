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
            'allTasks' => $allTasks
        ]);
    }

    public function edit($postId)
    {
        $post = Post::find($postId);
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all()
        ]);
    }
    public function update($postId, PostRequest $request)
    {


        $requestData = $request->all();
        $post = Post::find($postId);
        $post->update($requestData);
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($postId)
    {

        $post = Post::findorfail($postId);

        $post->delete();
        return redirect()->route('posts.index');
    }
    


    public function store(TaskRequest $request)
    {

        $requestData = $request->all();
        Task::create($requestData);
        return redirect()->route('tasks.store');
    }

}
