<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller {
    public function index() {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'is_completed' => 'required|boolean',
        ]);
        $task = Task::create($validated);
        return response()->json($task, 201);
    }
    public function show($id) {
        $task = Task::findOrFail($id);
        return new TaskResource($task);
    }
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'string|max:50',
            'description' => 'nullable|string|max:255',
            'is_completed' => 'boolean',
        ]);
        $task = Task::findOrFail($id);
        $task->update($validated);

        return response()->json($task, 200);
    }
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
