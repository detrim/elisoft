<?php

namespace App\Http\Controllers;

use App\Models\LogActivityUsers;
use Illuminate\Http\Request;

class LogActivityUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = LogActivityUsers::all();
        return view('admin.LogActivityUsers', compact('activity'));
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
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function show(LogActivityUsers $logActivityUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(LogActivityUsers $logActivityUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogActivityUsers $logActivityUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogActivityUsers $logActivityUsers)
    {
        //
    }
}
