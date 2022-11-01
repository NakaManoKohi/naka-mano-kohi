<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Exception\ValidationException;

class SettingController extends Controller
{
    public function index() {
        return view('setting.general', [
            'title' => 'Setting'
        ]);
    }

    public function profile() {
        return view('setting.profile', [
            'title' => 'Setting'
        ]);
    }

    public function updateProfile(Request $request){
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'email|required'
        ];

        $validatedData = $request->validate($rules);

        User::where('id', auth()->user()->id)->update($validatedData);

        return back()->with('success', 'Profile has been updated');
    }
    
    
    public function password(User $user) {
        return view('setting.password', [
            'title' => 'Setting',
        ]);
    }

    public function updatePassword(Request $request, User $user){
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required'
        ]);

        if(Hash::check($validatedData['current_password'], auth()->user()->password)){
            if($validatedData['password'] == $validatedData['confirm_password']){
                User::where('id', auth()->user()->id)->update(['password' => Hash::make($validatedData['password'])]);
                return back()->with('success', 'Password has been changed');
            }          
        }

    }

    public function notifications() {
        return view('setting.notifications', [
            'title' => 'Setting'
        ]);
    }

    public function membership() {
        return view('setting.membership', [
            'title' => 'Setting'
        ]);
    }

}
