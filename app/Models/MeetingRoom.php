<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'access_code',
        'date',
        'start_time',
        'end_time',
        'status',
    ];
        // BookingMeeting
    public function BookingMeeting()
    {
        return $this->hasMany(BookingMeeting::class);
    }

    public function AddNotificationEmail()
    {
    return $this->hasMany(AddNotificationEmail::class);
    }
}
