<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follows;
use App\Models\FollowsHistories;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
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
            'following' => Follows::where('followed_by', $user->id),
        ];

        $data['activities'] = DB::table('follows_histories')->join('users as user', 'follows_histories.user_id', '=', 'user.id')->join('users as user_following', 'follows_histories.followed_by', '=', 'user_following.id')->select('follows_histories.*', 'user.username as user', 'user_following.username as user_following')->where('followed_by', $user->id)->orderByDesc('updated_at')->get()->all();
        // $data['activities'] = FollowsHistories::with(
        //     ['user' => function($user){$user->where(Follows::select('user_id')->where('user_id', $user->id));}],
        //     )->get()->all();
        // FollowsHistories::where('followed_by', $user->id)->get()->all()
        // array_merge(
        //     Follows::where('followed_by', $user->id)->get()->toArray(), 
        //     Blog::where('user_id', $user->id)->get()->toArray());
        // usort($activities, function($a, $b){return strcmp($a['created_at'], $b['created_at']);});
        // $data['activities'] = $activities;
        if (auth()->user() != null) {
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count();
        }
        // dd(Follows::select('user_id')->where('user_id', $user->id));
        return view('profile.profile', $data);
    }

    public function follow(User $user) {
        Follows::create(['user_id' => $user->id, 'followed_by' => auth()->user()->id]);
        FollowsHistories::create(['user_id' => $user->id, 'followed_by' => auth()->user()->id]);
        return redirect('/'.$user->username);
    }

    public function unfollow(User $user){
        $data = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->first()->getAttributes();
        Follows::where($data)->delete();
        $data['status'] = 'unfollowing';
        $data['updated_at'] = date("Y-m-d h:i:s");
        FollowsHistories::create($data);
        return redirect('/'.$user->username);
    }

    public function post(User $user, Post $post){
        $data = [
            'title' => 'Profile',
            'user' => $user,
            'followers' => Follows::where('user_id', $user->id),
            'following' => Follows::where('followed_by', $user->id),
            'posts' => Post::where('user_id', $user->id)->get()
        ];

        $data['activities'] = DB::table('follows_histories')->join('users as user', 'follows_histories.user_id', '=', 'user.id')->join('users as user_following', 'follows_histories.followed_by', '=', 'user_following.id')->select('follows_histories.*', 'user.username as user', 'user_following.username as user_following')->where('followed_by', $user->id)->orderByDesc('updated_at')->get()->all();
        if (auth()->user() != null) { 
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count();
        }

        return view('profile.post', $data);
    }
}
