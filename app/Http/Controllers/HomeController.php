<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
        
    // }
    public function redirect() {
        if(Auth::id()) {
            if(Auth::user()->usertype == '0') {
                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else {
                return view('admin.home');
            }
        }
        else {
            return redirect()->back();
        }
    }

    public function index() {
        if(Auth::id()) {
            return redirect('home');
        }
        else {
        $doctor = Doctor::all();
        return view('user.home',compact('doctor'));
        }
    }

    public function appointment(Request $request) {
       $data = new Appointment(); 
       
       $data->full_name = $request->name;

       $data->email_address = $request->email;

       $data->date = $request->date;

       $data->phone_number = $request->number;

       $data->appointmenttime = $request->appointmenttime;

       $data->message = $request->message;

       $data->doctor = $request->doctor;

       $data->status = 'In progress';

       if(Auth::id()) {
        $data->user_id = Auth::user()->id;
       }

       $data->save();

       Alert::success('Success','Booked Appointment Successfully.We will contact you soon.');

       return redirect()->back();
    }
    public function myappointments() {
        $userid = Auth::user()->id;
        $appoint = Appointment::where('user_id', $userid)->get();

        if(Auth::user()->id) {
            return view('user.my_appointments',compact('appoint'));
        }
        else {
            return redirect()->back();
        }
    }
    public function cancel_appoint($id) {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
     