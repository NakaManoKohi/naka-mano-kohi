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
        // dd(Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count());
        return view('profile', [
            'title' => 'Profile',
            'user' => $user,
            'followers' => Follows::where('user_id', $user->id)->get(),
            'following' => Follows::where('followed_by', $user->id)->get(),
            'following_user' => Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count()
        ]);
    }

    public function follows(User $user, $index) {
        if($index === 'follow') {
            Follows::create(['user_id' => $user->id, 'followed_by' => auth()->user()->id]);
            return redirect('/profile/'.$user->username);
        } else {
            Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->delete();
            return redirect('/profile/'.$user->username);
        }
    }
}
