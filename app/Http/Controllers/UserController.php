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
    public function edit()
    {
        $user = Auth::user();
        return view('editUser', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Add other fields you want to validate/update
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other fields as needed

        $user->save();

        return redirect()->route('account.editUser')->with('success', 'Account information updated successfully.');
    }

}
