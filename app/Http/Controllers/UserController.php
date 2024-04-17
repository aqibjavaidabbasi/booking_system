<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNotificationEmail;
class UserController extends Controller
{
    //
    public function update_status($id,$slug)
    {
        $user = User::where('id',$id)->first();

        if ($user->status == false)
        {

            $user->status = true;
            $user->auth_code = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            // send here dynamic code with email

             Mail::to($user->email)->send(new SendNotificationEmail($user,$user->status));
        }else
        {
            $user->status = false;
        }
        $user->update();
        return redirect()->back();
    }
    // destroy the user
    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect()->back();
    }
}
