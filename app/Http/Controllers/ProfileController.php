<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        // dd($user);
        return view('profile', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }
}
