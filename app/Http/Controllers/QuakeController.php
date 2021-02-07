<?php

namespace App\Http\Controllers;

use App\Models\Quake;
use Illuminate\Http\Request;

class QuakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Quake::orderBy('id','desc')->limit(10)->get());

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
     * @param  \App\Models\Quake  $quake
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quake= Quake::find($id);
        return response()->json($quake);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quake  $quake
     * @return \Illuminate\Http\Response
     */
    public function edit(Quake $quake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quake  $quake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quake $quake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quake  $quake
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quake $quake)
    {
        //
    }
}
