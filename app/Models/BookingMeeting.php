<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingMeeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'meeting_room_id',
        'start_time',
        'end_time',
        'status',
        'description',
    ];

    // user
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // meeting room
    public function MeetingRoom()
    {
        return $this->belongsTo(MeetingRoom::class,'meeting_room_id');
    }

}
