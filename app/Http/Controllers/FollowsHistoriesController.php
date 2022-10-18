<?php

namespace App\Http\Controllers;

use App\Models\FollowsHistories;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFollowsHistoriesRequest;
use App\Http\Requests\UpdateFollowsHistoriesRequest;

class FollowsHistoriesController extends Controller
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
     * @param  \App\Http\Requests\StoreFollowsHistoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFollowsHistoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowsHistories  $followsHistories
     * @return \Illuminate\Http\Response
     */
    public function show(FollowsHistories $followsHistories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowsHistories  $followsHistories
     * @return \Illuminate\Http\Response
     */
    public function edit(FollowsHistories $followsHistories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFollowsHistoriesRequest  $request
     * @param  \App\Models\FollowsHistories  $followsHistories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFollowsHistoriesRequest $request, FollowsHistories $followsHistories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowsHistories  $followsHistories
     * @return \Illuminate\Http\Response
     */
    public function destroy(FollowsHistories $followsHistories)
    {
        //
    }
}
