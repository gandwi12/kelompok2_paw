<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = \App\Models\User::all(); // ambil semua user
    return view('User.index', compact('users'));
}


public function edit($id)
{
    $user = User::findOrFail($id);
    return view('User.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'nullable|string|max:50',
    ]);

    $user = User::findOrFail($id);
    $user->update($request->only('name', 'email', 'role'));

    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
}
}