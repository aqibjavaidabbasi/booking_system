<?php

namespace App\Http\Controllers;

use App\Models\AvailabilitySlot;
use Illuminate\Http\Request;

class AvailabilitySlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $availabilitySlots = AvailabilitySlot::orderBy("created_at","desc")->paginate(10);
        return view("admin/availability.index", compact("availabilitySlots"));
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
    public function show(AvailabilitySlot $availabilitySlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AvailabilitySlot $availabilitySlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AvailabilitySlot $availabilitySlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AvailabilitySlot $availabilitySlot)
    {
        //
    }
}
