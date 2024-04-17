<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingRoomController;
use App\Http\Controllers\AvailabilitySlotController;
use App\Http\Controllers\BookingMeetingController;
use App\Http\Controllers\AddNotificationEmailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin-login', function () {
return view('auth.login');
})->name('login');

// Auth::routes();
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(
    ['prefix' => "/dashboard/", "middleware" => ["auth", 'verified']],
    function () {
        Route::get('', [HomeController::class, 'index'])->name('dashboard');

        Route::get('user/destroy/{id}',[UserController::class,'destroy'])->name('user-destroy');

        // meeting rooms
        Route::resource('meetingrooms',MeetingRoomController::class);
        Route::put('/meetingrooms/{id}', [MeetingRoomController::class,
            'update'])->name('meetingrooms.update');
       Route::get('/meetingsroom/delete/{id}', [MeetingRoomController::class, 'destroy'])->name('meetingrooms.delete');


    // AddNotificationEmailController
       Route::post('/meetingsroom/store-emails/{id}', [AddNotificationEmailController::class,
       'notification_emails'])->name('meetingrooms.notification_emails');

    // approved status of meeting
    Route::get('user/change-status/{id}/{slug}',[BookingMeetingController::class,'update_status'])->name('user-booking-status');

        // meeting AvailabilitySlotController
        Route::resource('availibilities',AvailabilitySlotController::class);
        // meeting BookingMeetingController
        Route::resource('bookingroom',BookingMeetingController::class);
    }
);

Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '^(?!api).*$');
