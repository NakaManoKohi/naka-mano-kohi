<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
    }

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
            'email' => 'email|required',
            'about' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        User::where('id', auth()->user()->id)->update($validatedData);

        return back()->with('success', 'Profile has been updated');
    }

    public function updateProfileImage(Request $request){
        $rules = [
            'image' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('images');
        }

        User::where('id', auth()->user()->id)->update($validatedData);
        return back()->with('success', 'Profile Image has been changed');

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
            } else{
                return back()->with('failed', 'Password confirmation failed');
            }
        } else{
            return back()->with('failed', 'Your current password doesn\'t match with our credentials');
        }

    }

    public function notifications() {
        return view('setting.notifications', [
            'title' => 'Setting'
        ]);
    }

    public function membership() {
        return view('setting.membership.pricing', [
            'title' => 'Setting'
        ]);
    }

    public function bronze(User $user){
        User::where('username', $user->username)->update(['benefit'=> 3]);
        return back()->with('success','You have purchased bronze badge');
    }

    public function silver(User $user){
        User::where('username', $user->username)->update(['benefit' => 2]);
        return back()->with('success', 'You have purchased silver badge');
    }

    public function gold(User $user){
        User::where('username', $user->username)->update(['benefit' => 1]);
        return back()->with('success', 'You have purchased gold badge');
    }

}
