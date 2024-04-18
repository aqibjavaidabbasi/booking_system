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
// route::get('test', function () {
//     session()->put('code', '123');
// });
// route::get('test2', function () {
//     dd(session()->get('code'));
// });
Route::post('/validate-access-code', [MeetingRoomController::class, 'validateAccessCode']);
Route::post('/validate-auth-code', [MeetingRoomController::class, 'checkAuthCode']);
Route::post('/store-booking', [MeetingRoomController::class, 'storeBooking']);
Route::get('/send-otp/{id?}', [MeetingRoomController::class, 'sendotp']);
Route::get('/cancel-booking/{id?}', [MeetingRoomController::class, 'cancelbooking']);
Route::get('/get-meetings-data/{token?}', [MeetingRoomController::class, 'getMeetingData']);