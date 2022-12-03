<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\MeetingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $meetings = new Meeting();
        // Log::error($meetings);
        $meetings = Meeting::with('meeting_users')->orderBy('start_date_time', 'desc')->get();
        return $meetings;
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
        $meeting = new Meeting;
        
        $meeting->title = $request->title;
        $meeting->start_date_time = $request->start_date_time;
        $meeting->end_date_time = $request->end_date_time;
        $meeting->how = $request->how;
        $meeting->save();

        $meeting->meeting_users = $request->meeting_users;
        $meeting->meeting_users()->attach($meeting->meeting_users);

        $update_meeting = $this->show($meeting->id);
        return $update_meeting;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting = Meeting::with('meeting_users')->find($id);
        return $meeting;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meeting = Meeting::with('meeting_users')->find($id);
        
        $meeting->title = $request->title;
        $meeting->start_date_time = $request->start_date_time;
        $meeting->end_date_time = $request->end_date_time;
        $meeting->how = $request->how;
        $meeting->save();

        $meeting->meeting_users = $request->meeting_users;
        $meeting->meeting_users()->sync($meeting->meeting_users);
        // return this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
