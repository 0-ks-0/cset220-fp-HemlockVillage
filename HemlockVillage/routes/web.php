<?php

use Illuminate\Support\Facades\Route;

require("rapi.php");

Route::get('/', function () {
    return view('landing');
});

Route::get("/login", function ()
{
	return view("login");
})->name("login.form");

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
