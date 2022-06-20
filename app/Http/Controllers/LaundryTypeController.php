<?php

namespace App\Http\Controllers;

use App\Models\LaundryType;
use App\Http\Requests\StoreLaundryTypeRequest;
use App\Http\Requests\UpdateLaundryTypeRequest;

class LaundryTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreLaundryTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaundryTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function show(LaundryType $laundryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function edit(LaundryType $laundryType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaundryTypeRequest  $request
     * @param  \App\Models\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaundryTypeRequest $request, LaundryType $laundryType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaundryType $laundryType)
    {
        //
    }
}
