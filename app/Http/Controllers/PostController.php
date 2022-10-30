<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\DB;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getTimezone() {
        $ip = file_get_contents("http://ipecho.net/plain");
        $url = 'http://ip-api.com/json/'.$ip;
        $tz = file_get_contents($url);
        $tz = json_decode($tz,true)['timezone'];
        return $tz;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index',[
            'title' => 'Post',
            'posts' => Post::latest()->get(),
            'ranking' => DB::table('users')->leftJoin('follows', 'users.id', '=', 'follows.user_id')->select('users.*', DB::raw('count(follows.followed_by) as followers'))->groupBy('users.id')->orderByDesc('followers')->limit('10')->get()->all(),
            'publicChat' => DB::table('public_chats')->leftJoin('users', 'public_chats.user_id', '=', 'users.id')->select('public_chats.*', 'users.username')->orderByDesc('updated_at')->get()->all(),
            'tz' => getTimezone()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create',[
            'title' => 'Post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validate([
            'caption' => 'required|max:2500'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/post')->with('success', 'The Post Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

}
