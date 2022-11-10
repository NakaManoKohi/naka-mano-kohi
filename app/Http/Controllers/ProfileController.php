<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Models\User;
use App\Models\Events;
use App\Models\Follows;
use Illuminate\Http\Request;
use App\Models\FollowsHistories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    function status($table, $rows, $delete, $use, $status) {
        foreach ($rows as $key => $data) {
            $data->table = $table;
            $data->date = $data->$use;
            unset($data->$delete, $data->$use);
            $data->status = $status;
            if($status === 'unfollowing' && $data->deleted === 0) {
                unset($rows[$key]);
            }
        }
        return $rows;
    }

    function activities($user) {
        $following = $this->status('follows', Follows::where('followed_by', $user->id)->with(['follow', 'follower'])->get()->all(), 'updated_at', 'created_at', 'following');
        $unfollowing = $this->status('follows', Follows::where('followed_by', $user->id)->with(['follow', 'follower'])->get()->all(), 'created_at', 'updated_at', 'unfollowing');
        $makeBlog = $this->status('blog', Blog::where('user_id', $user->id)->with('user')->get()->all(), 'updated_at', 'created_at', 'create a blog');
        $activities = array_merge($following, $unfollowing, $makeBlog);
        usort($activities, function($a, $b) {
            $t1 = strtotime($a->date);
            $t2 = strtotime($b->date);
            return $t2 - $t1;
        });
        return $activities;
    }
    
    public function index(User $user)
    {
        $data = [
            'title' => 'Profile',
            'user' => $user,
            'followers' => Follows::where([['user_id', $user->id], ['deleted', false]]),
            'following' => Follows::where([['followed_by', $user->id], ['deleted', false]]),
            'activities' => $this->activities($user)
        ];
        if (auth()->user() != null) {
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id], ['deleted', false]])->count();
        }
        return view('profile.index', $data);
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
            'followers' => Follows::where([['user_id', $user->id], ['deleted', false]]),
            'following' => Follows::where([['followed_by', $user->id], ['deleted', false]]),
            'posts' => Post::where('user_id', $user->id)->get(),
            'activities' => $this->activities($user)
        ];
        if (auth()->user() != null) { 
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count();
        }

        return view('profile.post', $data);
    }

    public function blog(User $user, Blog $blog){
        $data = [
            'title' => 'Profile',
            'user' => $user,
            'followers' => Follows::where([['user_id', $user->id], ['deleted', false]]),
            'following' => Follows::where([['followed_by', $user->id], ['deleted', false]]),
            'blogs' => Blog::where('user_id', $user->id)->get()
        ];
        if (auth()->user() != null) { 
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count();
        }

        return view('profile.blog', $data);
    }

    public function event(User $user, Events $events){
        $data = [
            'title' => 'Profile',
            'user' => $user,
            'followers' => Follows::where([['user_id', $user->id], ['deleted', false]]),
            'following' => Follows::where([['followed_by', $user->id], ['deleted', false]]),
            'events' => Events::where('user_id', $user->id)->get()
        ];
        if (auth()->user() != null) { 
            $data['following_user'] = Follows::where([['user_id', $user->id], ['followed_by', auth()->user()->id]])->count();
        }

        return view('profile.event', $data);
    }
}
