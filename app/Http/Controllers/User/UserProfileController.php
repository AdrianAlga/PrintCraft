<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('users.profile.index', [
            "title" => "Profile",
            "user" => auth()->user(),
        ]);
    }

    public function edit()
    {
        return view("users.profile.edit", [
            "title" => "Profile Edit",
            "user" => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $validated = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email,$user->id",
            "phone" => "required",
            "gender" => "nullable",
            "description" => "nullable|string",
        ]);
        $user->update($validated);

        return redirect()->route('profile')->with('success', "Profile Berhasil diUpdate");
    }

    public function profileImage(Request $request) {
        $user = User::find(auth()->user()->id);
        $validated = $request->validate([
            "image" => "required|image",
        ]);
        $validated["image"] = $request->file('image')->store('user');
        $user->update($validated);
        return back();
    }
}
