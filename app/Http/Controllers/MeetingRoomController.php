<?php

namespace App\Http\Controllers;

use App\Models\MeetingRoom;
use App\Models\User;
use App\Models\BookingMeeting;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNotificationEmail;
use App\Mail\BookingConfirmationOTP;
use Illuminate\Support\Facades\Crypt;
class MeetingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        //
        $rooms = MeetingRoom::orderBy("created_at","desc")->paginate(10);
        return view("admin/meeting_rooms.index", compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.meeting_rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

       if ($validator->fails()) {
       return redirect()->back()->withErrors($validator)->withInput();
       }

       $room = new MeetingRoom();
       $room->name = $request->name;
        $room->date = $request->date;
       $room->start_time = $request->start_time;
       $room->end_time = $request->end_time;

       // Check if an access code is provided in the request
       if ($request->has('access_code')) {
            // Check if the provided access code already exists in the database
        $existingRoom = MeetingRoom::where('access_code', $request->access_code)->first();
        if ($existingRoom) {
            // Access code already exists, generate a new one
            $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } else {
            // Use the provided access code
            $code = $request->access_code;
        }
        } else {
            // Generate a new access code
            $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
       }

       // Assign the generated or provided access code to the room
       $room->access_code = $code;
       $room->description = $request->description;
       $room->save();
       return redirect()->route('meetingrooms.index')->with('success', 'Meeting room created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
            $room = MeetingRoom::find($id);
            return view('admin.meeting_rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the MeetingRoom by its ID
        $room = MeetingRoom::findOrFail($id);

        // Update the room attributes
        $room->name = $request->name;
        $room->date = $request->date;
        $room->start_time = $request->start_time;
        $room->end_time = $request->end_time;

        // Check if an access code is provided in the request
        if ($request->has('access_code')) {
        // Check if the provided access code already exists in the database
        $existingRoom = MeetingRoom::where('access_code', $request->access_code)->first();
        if ($existingRoom) {
        // Access code already exists, generate a new one
        $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } else {
        // Use the provided access code
        $code = $request->access_code;
        }
        } else {
        // Generate a new access code
        $code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        }

        // Assign the generated or provided access code to the room
        $room->access_code = $code;
        $room->description = $request->description;
        $room->save();

        // Redirect back to the index page with a success message
        return redirect()->route('meetingrooms.index')->with('success', 'Meeting room updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
        $room = MeetingRoom::findOrFail($id);
        $room->delete();
             return redirect()->route('meetingrooms.index')->with('danger', 'Meeting room deleted successfully');
    }
    // check the accedd token
    public function validateAccessCode(Request $request)
    {

        $accessCode = $request->input('access_code');
        $meetingRoom = MeetingRoom::where('access_code', $accessCode)->first();
        // dd($meetingRoom);
        if ($meetingRoom) {
            session()->put('AccessCode', $accessCode);
            return response()->json(['valid' => true], 200);
        } else {
            return response()->json(['valid' => false], 422);
        }
    }

    // get data
    public function getMeetingData(Request $request ,$token = null)
    {
        // dd(session()->get('AccessCode'));
        $accesstoken = '';
        if ($token != null && $token != 'undefined') {
            // chjeck an dverify the token .

            $decryptedToken = Crypt::decryptString($token);
            $user = User::with('BookingMeeting.MeetingRoom')->where('auth_code', $decryptedToken)->first();

            if ($user) {
                $accesstoken = $user->BookingMeeting->MeetingRoom->access_code;
            }
        }if ($token == 'undefined') {

            $accesstoken = session()->get('AccessCode');
        }
        $meetingRoom = MeetingRoom::with('BookingMeeting')->where('access_code','347655')->first();
        // $meetingRoom = MeetingRoom::with('BookingMeeting')->where('access_code',$accesstoken)->first();
        $data = $meetingRoom?->BookingMeeting->map(function ($meeting) {
            $color = '';
            switch ($meeting->status) {
            case 'Approved':
                $color = 'green';
            break;
            case 'Pending':
                $color = 'orange';
            break;
            case 'Reject':
                $color = 'red';
            break;
            case 'Cancel':
                $color = 'red';
            break;
            default:
                $color = 'orange';
            }
            return [
                'id' => $meeting->id,
                'title' => "Booked" . ' (' . Carbon::parse($meeting->start_time)->format('h:i') .
                ' - ' . Carbon::parse($meeting->end_time)->format('h:i') . ')',
                "start" => Carbon::parse($meeting->start_time)->format('Y-m-d\TH:i:s'),
                "end" => Carbon::parse($meeting->end_time)->format('Y-m-d\TH:i:s'),
                'color' => $color,
            ];
        });

        return response()->json($data);
        if ($meetingRoom) {
        return response()->json(['valid' => true,'meetingdata'=>$meetingRoom], 200);
        } else {
        return response()->json(['valid' => false], 422);
        }
    }
    // storeBooking
    public function storeBooking(Request $request)
    {

        $user = User::where('email',$request->input('email'))->first();
        if (!$user) {

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');


            if ($user->auth_code == null && $user->auth_code == false) {

                $user->status = true;

                 $authCode = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
                 $encryptedAuthCode = Crypt::encryptString($authCode);
                 $user->auth_code = $encryptedAuthCode;

                // send here dynamic code with email
                Mail::to($user->email)->send(new SendNotificationEmail($user, $user->status));
            } else {
                Mail::to($user->email)->send(new SendNotificationEmail($user, $user->status));
            }
        }
        $user->save();
        // new meeting booking
        $booking = new BookingMeeting();
        $meetingRoom = MeetingRoom::with('BookingMeeting')->where('access_code', session()->get('AccessCode'))->first();

        $booking->meeting_room_id = $meetingRoom->id;
        $booking->user_id = $user->id;

            $startTime = $request->input('startTime');
            $endTime = $request->input('endTime');

            if (preg_match('/^\d{2}:\d{2}:\d{2}$/', $startTime) && preg_match('/^\d{2}:\d{2}:\d{2}$/', $endTime)) {

                // If the input times are already in the desired format
                $booking->start_time = $request->input('eventDate') . ' ' . $startTime;
                $booking->end_time = $request->input('eventDate') . ' ' . $endTime;
            } else {

                // Append ':00' to the times to ensure they are in the format 'HH:mm:ss'
                $booking->start_time = $request->input('eventDate') . ' ' . $startTime . ':00';
                $booking->end_time = $request->input('eventDate') . ' ' . $endTime . ':00';
            }
            $booking->description = $request->input('description');

            $booking->save();
            // Mail::to($user->email)->send(new BookingConfirmation($booking));
        return response()->json(200);
    }
    // checking validate code before update and cancel or Delete
    public function checkAuthCode(Request $request)
    {

        $user = User::with('BookingMeeting.MeetingRoom')->where('auth_code', $request->access_code)->first();
        // // send first time one email
        // Mail::to($user->email)->send(new BookingConfirmationOTP($user));

        if ($user->auth_code == $request->access_code) {
                //
                $booking = BookingMeeting::where('id', $request->eventid)->first();

                $startTime = $request->input('startTime');
                $endTime = $request->input('endTime');

                if (preg_match('/^\d{2}:\d{2}:\d{2}$/', $startTime) && preg_match('/^\d{2}:\d{2}:\d{2}$/', $endTime)) {

                // If the input times are already in the desired format
                $booking->start_time = $request->input('eventDate') . ' ' . $startTime;
                $booking->end_time = $request->input('eventDate') . ' ' . $endTime;
                } else {

                // Append ':00' to the times to ensure they are in the format 'HH:mm:ss'
                $booking->start_time = $request->input('eventDate') . ' ' . $startTime . ':00';
                $booking->end_time = $request->input('eventDate') . ' ' . $endTime . ':00';
                }
                $booking->status = $request->eventstatus;
                $booking->save();
                Mail::to($user->email)->send(new BookingConfirmation($booking));

            return response()->json(['valid' => true], 200);
        } else {

            return response()->json(['valid' => false], 422);
        }
    }
}
