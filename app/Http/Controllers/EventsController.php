<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{   
    public function __construct() {
        $this->middleware(['auth', 'benefit:1||2'])->only('create');
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
            'date' => Carbon::now()->nthOfMonth(4, Carbon::SATURDAY),
            'aside' => aside()
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
            'aside' => aside()
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

        return redirect('/event')->with('success', 'New Event has been created');
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
    public function edit(Events $event)
    {
        return view('events.edit',[
            'title' => "Dashboard Event | Edit $event->title",
            'event' => $event,
            'aside' => aside()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventsRequest  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventsRequest $request, Events $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'date' => 'required'
        ];
        
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('images');
        }


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Events::where('id', $event->id)->update($validatedData);    

        return redirect('/' . auth()->user()->username . '/event')->with('success', 'The Event has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        if($event->image){
            Storage::delete($event->image);
        }

        Events::destroy($event->id);

        return redirect('/' . auth()->user()->username . '/event')->with('success', 'The Event has been deleted');
    }
}
