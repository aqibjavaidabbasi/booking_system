<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationOTP extends Mailable
{
    use Queueable, SerializesModels;

        public $otp;

        /**
        * Create a new message instance.
        *
        * @param \App\Models\User $user
        * @param \App\Models\BookingMeeting $booking
        * @return void
        */
        public function __construct($otp)
        {
            $this->otp = $otp;
        }

        public function build()
        {
             $address = 'meetinginfo@book.com';
             $subject = 'Booking Confirmation';
             $name = 'Jane Doe';

             return $this->view('emails-booking-confirmation-otp')
             ->from($address, $name)
             ->cc($address, $name)
             ->bcc($address, $name)
             ->replyTo($address, $name)
             ->subject($subject)
             ->with([ 'message' => $this->otp ]);


        }


}
