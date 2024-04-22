<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

        public $user,$booking,$forfirsttime;

        /**
        * Create a new message instance.
        *
        * @param \App\Models\User $user
        * @param \App\Models\BookingMeeting $booking
        * @return void
        */
        public function __construct($user,$booking,$forfirsttime)
        {
            $this->user = $user;
            $this->booking = $booking;
            $this->forfirsttime = $forfirsttime;
        }

        public function build()
        {

             $address = 'meetinginfo@book.com';
             $subject = 'Booking Request Confirmation';
             $name = 'Jane Doe';

             return $this->view('emails-status-confirmation')
             ->from($address, $name)
             ->cc($address, $name)
             ->bcc($address, $name)
             ->replyTo($address, $name)
             ->subject($subject)
             ->with([ 'message' => $this->user,$this->booking,$this->forfirsttime ]);


        }


}
