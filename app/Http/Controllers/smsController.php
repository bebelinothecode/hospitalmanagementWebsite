<?php

namespace App\Http\Controllers;

use PHPUnit\Exception;
use Twilio\Rest\Client;
use App\Models\Appointment;


class smsController extends Controller
{
    public function sms($id) {
        $data = Appointment::find($id);
        $number = $data->phone_number;
        $receiverNumber = '+233'.$number;
        $message = "Your appointment has been confirmed";
        try {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from'=> $twilio_number,
                "body"=> $message,
            ]);
            toast('Sent SMS successfully','success');
            return redirect()->back();
        }
        catch(Exception $e) {
            dd('Error: '.$e->getMessage());
        }
    }
    
    //
}
