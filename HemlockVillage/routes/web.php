<?php

namespace App\Http\Controllers\Regular;

use App\Models\Payment;

use Illuminate\Support\Facades\Route;

require("rapi.php");

Route::get('/', function () {
    return view('landing');
});

// Login
Route::get("/login", fn() => LoginController::showLoginForm())->name("login.form");
Route::post("/login", fn() => LoginController::login(request()));

// Logout
Route::get("/logout", fn() => LoginController::logout(request()));

// Home
Route::get("/home", fn() => PageController::home())->middleware("auth");

// Payment testing
Route::get("/test/payment", function ()
{
    return view("test_payment");
});

Route::get("/test/payment/{patientId}", function ($patientId)
{
    return view("test_payment")->with([
        "patientId" => $patientId,
        "bill" => Payment::getBill($patientId)
    ]);
});

Route::patch("/test/payment/{patientId}", function ($patientId)
{
    $amount = request()->get("amount");

    Payment::updateBill($patientId, $amount);

    session()->flash("success", "$$amount has been paid");

    return redirect()->back();
});

Route::get('/patientshome', function () {
    return view('patientshome');
});

Route::get('/patientinfo', function () {
    return view('patientinfo');
});

Route::get('/doctorsappointment', function () {
    return view('doctorsappointment');
});

Route::get('/doctorshome', function () {
    return view('doctorshome');
});

Route::get('/employeeinfo', function () {
    return view('employeeinfo');
});

Route::get('/rolecreation', function () {
    return view('rolecreation');
});

Route::get('/editroles', function () {
    return view('editroles');
});

Route::get('/searchpatient', function () {
    return view('searchpatient');
});

Route::get('/registrationapproval', function () {
    return view('registrationapproval');
});

Route::get('/newroster', function () {
    return view('newroster');
});

Route::get('/rosters', function () {
    return view('rosters');
});

Route::get('/editroster', function () {
    return view('editroster');
});

Route::get('/payments', function () {
    return view('payments');
});

Route::get('/familyhome', function () {
    return view('familyhome');
});

Route::get('/adminreport', function () {
    return view('adminreport');
});

Route::get('/createprescription', function () {
    return view('createprescription');
});

Route::get('/patientofdoc', function () {
    return view('patientofdoc');
});

Route::get('/caregivershome', function () {
    return view('caregivershome');
});

Route::get('/familypayment', function () {
    return view('familypayment');
});
