<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([$task], 200);
    }

    public function get(Request $request)
    {
        $params = $request->all();
        $tasks = Task::where('user_id', Auth::user()->id)->filters($params)->paginate(intval($request->per_page));
        return response()->json($tasks, 200);
    }

    public function getById($id)
    {
        $task = Task::where('user_id', Auth::user()->id)->where('id', $id)->get()->first();
        if(!isset($task)){
            return response()->json(['message' => 'task not found'], 404);
        }
        return response()->json($task, 200);
    }

    public function delete($id)
    {
        $task = Task::find($id);

        if(!isset($task)){
            return response()->json(['message' => 'task not found'], 404);
        }

        Task::find($id)->delete();
        return response()->json(['message' => 'task deleted.'], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = Task::find($request->id);

        if(!isset($task)){
            return response()->json(['message' => 'task not found'], 404);
        }

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([$task], 200);
    }
}
