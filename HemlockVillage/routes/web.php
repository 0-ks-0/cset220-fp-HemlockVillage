<?php

namespace App\Http\Controllers\Regular;

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
