<?php

namespace App\Http\Controllers;

use App\Mountain;
use Illuminate\Http\Request;

class MountainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mountains = Mountain::all();

        return view('asimimin.mountainlist', compact('mountains'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function show(Mountain $mountain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function edit(Mountain $mountain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mountain $mountain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mountain  $mountain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mountain $mountain)
    {
        //
    }
}
