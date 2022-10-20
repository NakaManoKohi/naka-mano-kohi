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

        if(request('search')){
            $blogs->where('title', 'like', '%' . request('search') . '%');
        }

        if(request('search')){
            $events->where('title', 'like', '%'. request('search') . '%');
        }

        return view('search.index',[
            'title' => 'Search',    
            'blogs' => $blogs->paginate(7),
            'events' =>  $events->paginate(7)
        ]);
        // dd(request('search'));
    }
}
