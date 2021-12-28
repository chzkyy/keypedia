<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //edit password
    public function edit()
    {
        return view('auth.passwords.edit',[
            'categories' => Category::all(),
        ]);
    }

    //update password
    public function update(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password')),
        ]);
        return redirect()->route('change_password')->with('success', 'Password updated successfully.');
    }
}
