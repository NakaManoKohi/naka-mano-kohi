<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    public function index() {
        return view('setting.general', [
            'title' => 'Setting'
        ]);
    }

    public function profile() {
        return view('setting.profile', [
            'title' => 'Setting',
            'user' => User::where('username', auth()->user()->username)->get()
        ]);
    }

    public function updateProfile(Request $request, User $user){
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'email|required'
        ];

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/setting/profile')->with('success', 'Profile has been updated');
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

    public function password() {
        return view('setting.password', [
            'title' => 'Setting'
        ]);
    }
}
