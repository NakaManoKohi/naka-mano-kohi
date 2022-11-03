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
            'followers' => Follows::where([['user_id', $user->id], ['deleted', false]]),
            'following' => Follows::where([['followed_by', $user->id], ['deleted', false]]),
        ];
        function status($rows, $delete, $use, $status) {
            foreach ($rows as $key => $data) {
                $data->date = $data->$use;
                unset($data->$delete, $data->$use);
                $data->status = $status;
                if($status === 'unfollowing' && $data->deleted === 0) {
                    unset($rows[$key]);
                }
            }
            return $rows;
        }
        $A = status(Follows::where('followed_by', $user->id)->with(['follow', 'follower'])->get()->all(), 'updated_at', 'created_at', 'following');
        $B = status(Follows::where('followed_by', $user->id)->with(['follow', 'follower'])->get()->all(), 'created_at', 'updated_at', 'unfollowing');
        $data['activities'] = array_merge($A, $B);
        usort($data['activities'], function($a, $b) {
            $t1 = strtotime($a->date);
            $t2 = strtotime($b->date);
            return $t2 - $t1;
        });
        if (auth()->user() != null) {
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id], ['deleted', false]])->count();
        }
        return view('profile.profile', $data);
    }

    public function follow(User $user) {
        Follows::create(['user_id' => $user->id, 'followed_by' => auth()->user()->id]);
        return back();
    }

    public function unfollow(User $user){
        Follows::where([
            ['user_id', $user->id], 
            ['followed_by', auth()->user()->id], 
            ['deleted', false]])->update([
                'updated_at' => date('Y-m-d H:i:s'), 
                'deleted' => true]);
        return back();
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
