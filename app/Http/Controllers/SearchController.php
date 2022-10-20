<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Events;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request){
        $blogs = Blog::latest();
        $events = Events::latest();
        $users = User::latest();

        if(request('search')){
            $blogs->where('title', 'like', '%' . request('search') . '%');
        }

        if(request('search')){
            $events->where('title', 'like', '%'. request('search') . '%');
        }

        if(request('search')){
            $users->where('username', 'like', '%' . request('search') . '%' );
        }

        return view('search.index',[
            'title' => 'Search',    
            'blogs' => $blogs->get(),
            'events' =>  $events->get(),
            'users' => $users->get()    
        ]);
        // dd(request('search'));
    }
}
