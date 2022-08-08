<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\smsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(HomeController::class)->group(function() {
    Route::get('/','index');
    Route::post('/appointment','appointment');
    Route::get('/myappointments','myappointments');
    Route::get('/home','redirect');
    Route::get('/cancel_appoint/{id}','cancel_appoint');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/add_doctor_view','addview');
    Route::get('/show_all_appointments','showallappointments');
    Route::post('/upload_doctor','upload');
    Route::get('/showalldoctors','showalldoctors');
    Route::get('/approved/{id}','approved');
    Route::get('/cancelled/{id}','cancelled');
    Route::get('/deletedoctor/{id}','deletedoctor');
    Route::get('/updatedoctor/{id}','updatedoctor');
    Route::post('/editdoctor/{id}','editdoctor');
});

// Auth::routes(['verify'=>true]);

// Route::get('/email/verfify', function() {
//     return view('auth.verify-email');
// })->middleware('auto')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth','signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function(Request $request) {
//     $request->user()->SendEmailVerificationNotification();

//     return back()->with('message','Verification link sent');
// })->middleware(['auth','throttle:6,1'])->name('verification.send');

Route::get('/sendmail/{id}',[MailController::class,'sendmail']);

Route::get('/sms/{id}',[smsController::class,'sms'])->name("send.sms");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
