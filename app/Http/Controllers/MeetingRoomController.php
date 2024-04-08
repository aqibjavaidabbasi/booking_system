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

         session()->put('AccessCode', $accessCode);

        $meetingRoom = MeetingRoom::where('access_code', $accessCode)->first();
        // dd($meetingRoom);
        if ($meetingRoom) {
        return response()->json(['valid' => true], 200);
        } else {
        return response()->json(['valid' => false], 422);
        }
    }
    // get data
    public function getMeetingData(Request $request ,$token = null)
    {



        $accesstoken = '';
        if ($token != null) {
            // chjeck an dverify the token .
            $user = User::with('BookingMeeting.MeetingRoom')->where('auth_code', $token)->first();

            if ($user) {
                $accesstoken = $user->BookingMeeting->MeetingRoom->access_code;
                session()->put('AccessCode', $accesstoken);
            } else if ($token == 'undefined') {

                $accesstoken = session()->get('AccessCode');
            }
        }
        $meetingRoom = MeetingRoom::with('BookingMeeting')->where('access_code',$accesstoken)->first();
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
            default:
                $color = 'orange';
            }
            return [
                // 'title' => $meeting->status .': '. Carbon::parse($meeting->start_time)->format('h-m-i') .
                // ' to ' . Carbon::parse($meeting->end_time)->format('h-m-i'),
                'title' => $meeting->status .': '. Carbon::parse($meeting->start_time)->format('h:i:s') .
                ' to ' . Carbon::parse($meeting->end_time)->format('h:i:s'),
                "start" => Carbon::parse($meeting->start_time)->format('Y-m-d\TH:i:s'), // Format start time in ISO 8601
                "end" => Carbon::parse($meeting->end_time)->format('Y-m-d\TH:i:s'), // Format end time in ISO 8601
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


        $user = new User();
            $user->name  =   $request->input('name');
            // $user->email =  $request->input('email');
        $user->save();
        // new meeting booking
        $booking = new BookingMeeting();
        // $meetingRoom = MeetingRoom::where('access_code', session::get('access_code'))->first();
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
        Mail::to($user->email)->send(new BookingConfirmation($booking));
        return response()->json(200);
    }
}
