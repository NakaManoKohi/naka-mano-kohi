<?php

namespace App\Http\Controllers;

use App\Models\Follows;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFollowsRequest;
use App\Http\Requests\UpdateFollowsRequest;

class FollowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFollowsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFollowsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follows  $follows
     * @return \Illuminate\Http\Response
     */
    public function show(Follows $follows)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Follows  $follows
     * @return \Illuminate\Http\Response
     */
    public function edit(Follows $follows)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFollowsRequest  $request
     * @param  \App\Models\Follows  $follows
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFollowsRequest $request, Follows $follows)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follows  $follows
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follows $follows)
    {
        //
    }
}
