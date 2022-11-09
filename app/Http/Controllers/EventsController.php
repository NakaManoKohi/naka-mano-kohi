<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventsController extends Controller
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
        return view('events.index',[
            'title' => "Events",
            'events' => Events::latest()->paginate(4),
            'ranking' => DB::table('users')->leftJoin('follows', 'users.id', '=', 'follows.user_id')->select('users.*', DB::raw('count(follows.followed_by) as followers'))->groupBy('users.id')->orderByDesc('followers')->limit('10')->get()->all(),
            'date' => Carbon::now()->nthOfMonth(4, Carbon::SATURDAY),
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
        return view('events.create',[
            'title' => 'Create Event',
            'ranking' => User::withCount('followers')->groupBy('id')->orderByDesc('followers_count')->get()->all(),
            'publicChat' => DB::table('public_chats')->leftJoin('users', 'public_chats.user_id', '=', 'users.id')->select('public_chats.*', 'users.username')->orderByDesc('updated_at')->get()->all(),
            'tz' => getTimezone()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'date' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Events::create($validatedData);

        return redirect('/')->with('success', 'New Event has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $event)
    {
        return view('events.show',[
            'title' => 'Events | ' . $event->title,
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventsRequest  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, Events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $events)
    {
        //
    }
}
