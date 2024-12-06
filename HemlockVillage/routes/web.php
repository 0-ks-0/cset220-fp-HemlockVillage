<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckRole;

require("rapi.php");

Route::get('/', fn() => PageController::landing());

// Signup
Route::get("/signup", fn() => SignupController::index());
Route::post("/signup", fn() => SignupController::store(request()));

// Login
Route::get("/login", fn() => LoginController::showLoginForm())->name("login.form");
Route::post("/login", fn() => LoginController::login(request()));

// Logout
Route::get("/logout", fn() => LoginController::logout(request()));


// Admin and supervisor access
Route::middleware([CheckRole::class . ':1,2'])->group( function ()
{
    // Users
    Route::get("/users", fn() => PageController::users());

    // Report
    Route::get("/report", fn() => PageController::report());

    // Roster
    Route::get("/roster/create", fn() => PageController::indexrosterForm());
    Route::post("/roster/create", fn() => PageController::storeRosterForm(request()));
});

// All users access
Route::middleware("auth")->group( function ()
{
    // Home
    Route::get("/home", fn() => PageController::home());

});

// Doctor and Patient Access
Route::middleware([ CheckRole::class . ":3,5"])->group( function ()
{
    // Home
    Route::get("/home/{date}", fn($date) => PageController::homeWithDate($date));
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
