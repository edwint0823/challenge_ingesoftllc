<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use DateTime;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);

        if ($user->hasRole('admin')) {
            $tasks = Task::paginate(5);
        } else {
            $tasks = Task::where('user_id', auth()->user()->id)->paginate(5);
        }
        $tasks->getCollection()->transform(function ($task) {
            $date_time_due_date = new DateTime($task->due_date);
            $task->due_date = $date_time_due_date->format('Y-m-d');

            $date_time_created_at = new DateTime($task->created_at);
            $task->created_at = $date_time_created_at->format('Y-m-d');

            return $task;
        });
        return inertia('Tasks/Index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Task::create($data);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $date_time_due_date = new DateTime($task['due_date']);
        $task['due_date'] = $date_time_due_date->format('Y-m-d');
        return inertia('Tasks/Edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
