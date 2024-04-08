<?php

namespace App\Http\Controllers;

use App\Models\BookingMeeting;
use App\Models\MeetingRoom;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNotificationEmail;
class BookingMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookings = BookingMeeting::orderBy("created_at","desc")->paginate(10);
            return view("admin/booking.index", compact("bookings"));
    }

        // update status
        public function update_status($id,$slug)
        {

            $booking = BookingMeeting::where('id',$id)->first();
            $user = User::where('id',$booking->user_id)->first();

            if ($booking->status == 'Pending')
            {

                $user = User::where('id',$booking->user_id)->first();
                $user->status = true;
                $user->auth_code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            // update status
                $booking->status = 'Approved';

            }else if($booking->status == 'Reject')
            {

                $user->status = false;
                $booking->status == 'Reject';
            }

            $user->save();
            $booking->save();
            // send here dynamic code with email
            Mail::to($user->email)->send(new SendNotificationEmail($user,$booking->status));
            return redirect()->back();
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingMeeting $bookingMeeting)
    {
        //
    }
}
