<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateRole(Request $request, $id)
    {
        $user = Auth()->user()::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }

        $user->role_id = 2;
        $user->save();

        return redirect()->route('home')->with('success', 'Role updated successfully');
    }
    public function edit(User $user)
    {
        $loggedInUser = Auth::user();

        if ($loggedInUser->role_id === 1 && $loggedInUser->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('editUser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $loggedInUser = Auth::user();

    if ($loggedInUser->role_id === 1 && $loggedInUser->id !== $user->id) {
        abort(403, 'Unauthorized action.');
    }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_picture' => 'nullable|mimes:jpeg,png,jpg,gif'
            // Add other fields you want to validate/update
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Upload and save the image
        if ($request->hasFile('profile_picture')) {
            //takes image and puts into variable to use in database

            $newImagePath = time() . '-' . $request->name . '.' . $request->profile_picture->extension();
            //moves the image to the gameImages directory
            $request->profile_picture->move('profile_pictures', $newImagePath);
            $user->profile_picture = $newImagePath;
        }

        $user->save();

        return redirect()->route('account.editUser', compact('user'))->with('success', 'Account information updated successfully.');
    }

}
