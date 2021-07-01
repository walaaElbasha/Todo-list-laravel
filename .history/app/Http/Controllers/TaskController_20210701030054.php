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

    public function edit($taskId)
    {
        $task = Task::find($taskId);
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
    public function update($taskId, TaskRequest $request)
    {


        $requestData = $request->all();
        
        $task = Task::find($taskId);
        $task->update($requestData);
        $task->save();

        return redirect()->route('tasks.index');
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

        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return redirect()->route('tasks.index');
    }

}
