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


    public function store(TaskRequest $request)
    {

        $requestData = $request->all();
        Task::create($requestData);
        return redirect()->route('tasks.store');
    }

}
