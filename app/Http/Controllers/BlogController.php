<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        return view('blogs.index',[
            'title' => 'Blogs',
            'blogs' => Blog::latest()->paginate(7)
        ]);
    }

    public function show(Blog $blog){
        return view('blogs.show',[
            'title' => 'Single Blog',
            'blog' => $blog
        ]);
    }
}
