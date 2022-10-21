<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Events;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request){
        return view('search.index',[
            'title' => 'Search',    
            'blogs' => Blog::latest()->filter(request(['search']))->paginate(7),
            'events' =>  Events::latest()->filter(request(['search']))->paginate(7),
            'users' => User::filter(request(['search']))->get()    
        ]);
    }
}
