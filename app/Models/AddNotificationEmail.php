<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddNotificationEmail extends Model
{
    use HasFactory;
     protected $fillable = [
        'meeting_room_id',
        'email',
     ];

       public function MeetingRoom()
       {
       return $this->belongsTo(MeetingRoom::class,'meeting_room_id');
       }
}
