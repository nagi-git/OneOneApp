<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingUser extends Model
{
    use HasFactory;
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    // public function meeting_users()
    // {
    //     return $this->belongsToMany(User::class)->withTimestamps();
    // }
}
