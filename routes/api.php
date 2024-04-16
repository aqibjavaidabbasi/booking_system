<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingRoomController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// for front end
// routes/web.php
Route::post('/validate-access-code', [MeetingRoomController::class, 'validateAccessCode']);
Route::post('/validate-auth-code', [MeetingRoomController::class, 'checkAuthCode']);
Route::post('/store-booking', [MeetingRoomController::class, 'storeBooking']);
Route::get('/get-meetings-data/{token?}', [MeetingRoomController::class, 'getMeetingData']);
