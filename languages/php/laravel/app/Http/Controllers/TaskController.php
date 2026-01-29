<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;

class TaskController extends Controller {
    public function index(Request $request) {
        $tasks = $request->user()->tasks;
        return TaskResource::collection($tasks);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'is_completed' => 'required|boolean',
        ]);
        $task = $request->user()->tasks()->create($validated);
        return response()->json($task, 201);
    }
    public function show(Request $request, $id) {
        $task = $request->user()->tasks()->findOrFail($id);
        return new TaskResource($task);
    }
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'string|max:50',
            'description' => 'nullable|string|max:255',
            'is_completed' => 'boolean',
        ]);
        $task = $request->user()->tasks()->findOrFail($id);
        $task->update($validated);

        return response()->json($task, 200);
    }
    public function destroy(Request $request, $id) {
        $task = $request->user()->tasks()->findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
