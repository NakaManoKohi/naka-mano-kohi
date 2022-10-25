<?php

namespace App\Http\Controllers;

use App\Models\benefit;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorebenefitRequest;
use App\Http\Requests\UpdatebenefitRequest;

class BenefitController extends Controller
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
     * @param  \App\Http\Requests\StorebenefitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebenefitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit(benefit $benefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebenefitRequest  $request
     * @param  \App\Models\benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebenefitRequest $request, benefit $benefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(benefit $benefit)
    {
        //
    }
}
