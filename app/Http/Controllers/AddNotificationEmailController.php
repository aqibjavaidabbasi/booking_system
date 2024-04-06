<?php

namespace App\Http\Controllers;

use App\Models\AddNotificationEmail;
use Illuminate\Http\Request;

class AddNotificationEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    // notification_emails
    public function notification_emails(Request $request,$id)
    {
        $email = AddNotificationEmail::where("id",$id)->first();
        if($email){
            $email->email = $request->email;
        }else{
            $email = new AddNotificationEmail();
            $email->meeting_room_id = $id;
            $email->email = $request->email;
        }

        $email->save();
        return redirect()->back()->with("success","Notifications emails stored successfully!");
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
    public function show(AddNotificationEmail $addNotificationEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddNotificationEmail $addNotificationEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddNotificationEmail $addNotificationEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddNotificationEmail $addNotificationEmail)
    {
        //
    }
}