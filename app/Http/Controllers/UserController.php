<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('userImage');
        $validatedData['password'] = Hash::make('password');
        User::create($validatedData);
        Password::sendResetLink($request->only(['email']));
        return redirect()->route('user.index')->with('success', 'User added successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserFormRequest $request, User $user)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('userImage');
            !is_null($user->image) ?? Storage::delete($user->image);
        }
        $user->update($validatedData);
        return redirect()->route('user.index')->with('info', 'Details updated successfully.');
    }

    public function destroy(User $user)
    {
        Storage::delete($user->image);
        $user->delete();
        return redirect()->route('user.index')->with('danger', 'User removed successfully.');
    }
}
