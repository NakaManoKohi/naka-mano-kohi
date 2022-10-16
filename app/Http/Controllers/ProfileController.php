<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follows;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        // dd(Follows::where('user_id', $user->id)->count());
        return view('profile', [
            'title' => 'Profile',
            'user' => $user,
            'followers' => Follows::where('user_id', $user->id)->count(),
            'following' => Follows::where('followed_by', $user->id)->count(),
        ]);
    }
}
