<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Mail\CancelAppointmentMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuccessAppointmentEmail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function sendmail($id) {
        $data = Appointment::find($id);

        if($data->status == 'approved') {
            Mail::to($data->email_address)->send(new SuccessAppointmentEmail());
        }
        elseif($data->status == 'Cancelled') 
        {
            Mail::to($data->email_address)->send(new CancelAppointmentMail());
        }

        Alert::success('Success', 'Email has been sent.');

        return redirect()->back();
    }
    //
}
