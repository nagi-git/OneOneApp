<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MeetingController_0 extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // protected function create()
    protected function create(array $data)
    {
        Log::error('foo');
        Log::error($data);
        $format = "Y-m-d H:i:s";
        // $start_date_time = DateTime::createFromFormat($format, $data['meeting_date'].' '.$data['start_time']);
        // $end_date_time = DateTime::createFromFormat($format, $data['meeting_date'].' '.$data['end_time']);
        // var_dump($start_date_time);
        // var_dump($end_date_time);
        return Meeting::create([
            // 'title' => $data['title'],
            // 'start_date_time' => $start_date_time,
            // 'end_date_time' => $end_date_time,
            // 'agenda' => $data['agenda'],
            // 'other' => $data['other'],
        ]);
    }
}
