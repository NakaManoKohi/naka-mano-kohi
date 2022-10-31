<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Events $events)
    {
        return view('dashboard.events.index',[
            'title' => "Dashboard Events",
            'events' => $events->latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.events.create',[
            'title' => 'Dashboard Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect('/dashboard/event')->with('success', 'New Event has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $event)
    {
        return view('dashboard.events.show',[
            'title' => "Dashboard Event | $event->title",
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
        return view('dashboard.events.edit',[
            'title' => "Dashboard Event | Edit $event->title",
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'date' => 'required'
        ];
        
        if($request->slug != $event->slug){
            $rules['slug'] = 'required|unique:events';
        }
        
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

        return redirect('/dashboard/event')->with('success', 'The Event has been edited');
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

        return redirect('/dashboard/event')->with('success', 'The Event has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Events::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
