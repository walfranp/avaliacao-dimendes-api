<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRegisterRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function register(TaskRegisterRequest $taskRegisterRequest)
    {
        $params = $taskRegisterRequest->all();
        $params['user_id'] = Auth::user()->id;
        $task = Task::create($params);

        return response()->json([$task], 200);
    }

    public function get(Request $request)
    {
        $params = $request->all();
        $tasks = Task::filters($params)->paginate(intval($request->per_page));

        return response()->json($tasks, 200);
    }

    public function getTask(Task $task)
    {
        return response()->json($task, 200);
    }

    public function delete(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'task excluída.'], 200);
    }

    public function update(TaskUpdateRequest $taskUpdateRequest, Task $task)
    {
        $task->update($taskUpdateRequest->all());
        return response()->json([$task], 200);
    }
}
