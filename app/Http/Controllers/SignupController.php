<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index(){
        return view('signup');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|min:3|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required|min:8|max:20',
            'confirm password' => 'required|same:password',
            'address' => 'required|min:3|max:255',
            'phone' => 'required|min:8|max:16',
            'birth' => 'required',
            'email_address' => 'required|email:rfc,dns|unique:users',
        ]);

        $newSignup = new User($validatedData);
        $newSignup->password = Hash::make($newSignup->password);
        $newSignup->save();

        return redirect('login')->with('success', 'Signed Up Succesfully!');
    }
}
