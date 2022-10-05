<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register',[
            'title' => 'Register'
        ]);
    }   

    public function registerUser(Request $request){
        $validatedData = $request->validate([
          'name' => 'required|max:255',
          'username' => 'required|unique:users|min:5|max:255',
          'email' => 'required|unique:users|min:5|max:255',
          'password' => 'required|min:8|max:64'  
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registration Success! Please Login');

        return redirect('/login');
    }
}
