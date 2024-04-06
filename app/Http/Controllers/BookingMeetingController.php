<?php

namespace App\Http\Controllers;

use App\Models\BookingMeeting;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingMeeting $bookingMeeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingMeeting $bookingMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingMeeting $bookingMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingMeeting $bookingMeeting)
    {
        //
    }
}
