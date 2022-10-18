<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follows;
use App\Models\FollowsHistories;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $data = [
            'title' => 'Profile',
            'user' => $user,
            'followers' => Follows::where('user_id', $user->id),
            'following' => Follows::where('followed_by', $user->id)
        ];
        // $activities = array_merge(
        //     Follows::where('followed_by', $user->id)->get()->toArray(), 
        //     Blog::where('user_id', $user->id)->get()->toArray());
        // usort($activities, function($a, $b){return strcmp($a['created_at'], $b['created_at']);});
        // $data['activities'] = $activities;
        if (auth()->user() != null) {
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count();
        }
        // dd(date("Y-m-d h:i:s"));
        return view('profile', $data);
    }

    public function follows(User $user, $index) {
        if($index === 'follow') {
            Follows::create(['user_id' => $user->id, 'followed_by' => auth()->user()->id]);
            return redirect('/'.$user->username);
        } else {
            $data = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->first()->getAttributes();
            FollowsHistories::create($data);
            Follows::where($data)->delete();
            $data['status'] = 'unfollowing';
            $data['updated_at'] = date("Y-m-d h:i:s");
            FollowsHistories::create($data);
            // dd($data, date("Y-m-d h:i:s"));
            return redirect('/'.$user->username);
        }
    }
}
