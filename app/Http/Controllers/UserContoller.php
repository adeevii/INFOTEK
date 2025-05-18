<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return response()->json(User::all());
    }

    public function show($id) {
        return response()->json(User::findOrFail($id));
    }

    public function store(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,user,penulis,editor',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'role'  => 'sometimes|required|in:admin,user,penulis,editor',
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return response()->json($user);
    }

    public function destroy($id) {
        User::destroy($id);
        return response()->json(['message' => 'User deleted.']);
    }
}

