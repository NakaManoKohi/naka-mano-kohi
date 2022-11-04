<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'benefit:1||2'])->only('create');
    }

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
            'date' => Carbon::now()->nthOfMonth(4, Carbon::SATURDAY),
            'ranking' => User::withCount('followers')->groupBy('id')->orderByDesc('followers_count')->get()->all(),
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
            'title' => 'Post',
            'ranking' => User::withCount('followers')->groupBy('id')->orderByDesc('followers_count')->get()->all(),
            'publicChat' => DB::table('public_chats')->leftJoin('users', 'public_chats.user_id', '=', 'users.id')->select('public_chats.*', 'users.username')->orderByDesc('updated_at')->get()->all(),
            'tz' => getTimezone()
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
        return view('post.edit',[
            'title' => 'Post Edit',
            'post' => $post
        ]);
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
        $validatedData = $request->validate([
            'caption' => 'required|max:2500', 
        ]);

        if($request->image){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('images');
        }

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/' . auth()->user()->username . '/post')->with('success', 'Post has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        if($post->image){
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/' . auth()->user()->username . '/post')->with('success', 'Post has been deleted');
    }

}
