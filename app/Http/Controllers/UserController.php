<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
