<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $userId = Auth::id();
        $allTasks = Task::where('user_id',$userId)->orderBy('created_at','asc')->paginate(4);
        //find by user id 
        return view('tasks.index', [
            'allTasks' => $allTasks
        ]);
    }

    public function edit($taskId)
    {
        $task = Task::find($taskId);
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
    public function update($taskId, TaskRequest $request)
    {
        // $requestData = $request->all();
        // $task = Task::find($taskId);
        // $task->update($requestData);
        // $task->save();
        $requestData = $request->all();
        $task = Task::find($taskId);
        $task->update($requestData);
        $task->save();
        return redirect()->route('tasks.index')->with('success', "TODO updated successfully!");
    }
    

    public function destroy($taskId)
    {

        $task = Task::findorfail($taskId);

        $task->delete();
        return redirect()->route('tasks.index');
    }
    


    public function store(TaskRequest $request)
    {

        // $requestData = $request->all();
        // Task::create($requestData);

        $userId =Auth::id();
        $task = new Task;
        $task->name = $request->name;
        $task->user_id= $userId;

        $task->save();

        return redirect()->route('tasks.index');
    }

}
