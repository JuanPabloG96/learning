<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
/* use App\Http\Resources\UserResource; */

class UserController extends Controller {
    public function index() {
        $users = User::all();
        return response()->json($users, 200);
    }
    public function show($id) {
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $user = User::create($validated);
        return response()->json($user, 201);
    }
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);
        return response()->json($user, 200);
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
