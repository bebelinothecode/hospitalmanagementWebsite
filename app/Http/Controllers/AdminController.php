<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function addview() {
        return view('admin.add_doctor');
    }

    public function upload(Request $request) {
        $doctor = new Doctor();

        $image = $request->file;

        $imagename = time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->doctor_image = $imagename;

        $doctor->doctor_Pnumber = $request->number;

        $doctor->speciality = $request->speciality;

        $doctor->doctor_name = $request->name;

        $doctor->room_number = $request->room;

        $doctor->save();

        if($doctor->save()) {
            toast('Doctor added successfully','success');
        }
        else {
            toast('Your Post failed to upload','error');
        }
        return redirect()->back();
    }

    public function showallappointments() {
        $data=Appointment::all();
        return view('admin.showallappointments',compact('data'));
    }

    public function approved($id) {
        $data = Appointment::find($id);

        $data->status = 'approved';

        $data->save();

        return redirect()->back();
    }

    public function cancelled($id) {
        $data = Appointment::find($id);

        $data->status = 'Cancelled';

        $data->save();

        return redirect()->back();
    }

    public function showalldoctors() {
        $data = Doctor::all();
        if(empty($data)) {
            return ('No Records Found');
        }
        return view('admin.showalldoctors',compact('data'));
    }

    public function deletedoctor($id) {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id) {
        $data = Doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request,$id) {
        $doctor = Doctor::find($id);

        $doctor->doctor_name = $request->name;

        $doctor->doctor_Pnumber = $request->phone;

        $doctor->speciality = $request->speciality;

        $doctor->room_number = $request->room;

        $image = $request->file;

        if($image) {
        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->file->move('doctorimage',$imagename);

        $doctor->doctor_image = $imagename;

        }

        if($doctor->save()) {
            Alert::success('Success', 'Saved Changes Successfully');
        }

        else {
            Alert::error('Error Title', 'Error Message');
        }
        return redirect()->back();
    }

    public function send_mail($id) {
        $data = Appointment::find($id);
        return view('admin.email_view',compact('data'));
    }
 }
