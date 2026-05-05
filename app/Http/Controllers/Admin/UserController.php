<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified user.
     */
    public function edit()
    {
        $user = Auth::user();
        
        // Only allow editing admin users
        if (!$user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('error', 'Access denied.');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Only allow editing admin users
        if (!$user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('error', 'Access denied.');
        }

        // Validation rules
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];

        $request->validate($rules);

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.edit')->with('success', 'User profile updated successfully!');
    }
}






