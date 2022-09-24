<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class MeetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetings')->insert([
            [
                'title' => Str::random(10),
                'start_date_time' => new DateTime(),
                'end_date_time' => new DateTime(),
                'agenda' => Str::random(10),
                'other' => Str::random(10),
            ]
        ]);
    }
}
