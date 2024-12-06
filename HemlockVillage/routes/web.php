<?php

namespace App\Http\Controllers\Regular; // This defines the namespace of your controllers

use Illuminate\Support\Facades\Route;

// Name space is defined in a way that you don't need to import all these controllers under app\Http\Controllers\Regular
// use App\Http\Controllers\Regular\EmployeeController;
// use App\Http\Controllers\Regular\PatientController;
// use App\Http\Controllers\Regular\RosterController;
// use App\Http\Controllers\Regular\HomeController;
// use App\Http\Controllers\Regular\AuthController;
// use App\Http\Controllers\Regular\DoctorController;
// use App\Http\Controllers\Regular\RegistrationApprovalController;

use App\Http\Middleware\CheckRole;

require("rapi.php");

// Nav Bar Routes
Route::get("/test", function() {
    return view("editroster");
});

// ======== Authentication Routes ========
Route::get("/signup", fn() => SignupController::index());
Route::post("/signup", fn() => SignupController::store(request()));

Route::get("/login", fn() => LoginController::showLoginForm())->name("login.form");
Route::post("/login", fn() => LoginController::login(request()));

Route::get("/logout", fn() => LoginController::logout(request()));


// Admin and supervisor access
Route::middleware([CheckRole::class . ':1,2'])->group( function ()
{
    // Users
// ======== Admin and Supervisor Access Routes ========
Route::middleware([CheckRole::class . ':1,2'])->group(function () {
    Route::get("/users", fn() => PageController::users());
});

Route::middleware("auth")->group( function ()
{
    Route::get("/home", fn() => PageController::home());


});

// ======== Doctor and Patient Access ========
Route::middleware([ CheckRole::class . ":3,5"])->group( function ()
{
    // Home
    Route::get("/home/{date}", fn($date) => PageController::homeWithDate($date));
// Doctor and Patient Access
Route::middleware([ CheckRole::class . ":3,5"])->group( function ()
{
    // Home
    Route::get("/home/{date}", fn($date) => PageController::homeWithDate($date));
});

Route::get('/patientshome', function () {
    return view('patientshome');
});

// ======== Employee Routes ========
Route::get('/employees', [EmployeeController::class, 'index'])->name('employeeinfo.index'); // Employee list
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search'); // Search employee
Route::post('/employees/update-salary', [EmployeeController::class, 'updateSalary'])->name('employees.updateSalary'); // Update salary
Route::get('/employeeinfo/{employeeId}', [EmployeeController::class, 'show'])->name('employeeinfo.show'); // Employee info page

// ======== Patient Routes ========
Route::get('/patients', [PatientController::class, 'index'])->name('patientinfo.index'); // Patient list
Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search'); // Search patient
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show'); // View patient info
Route::post('/patients/{patientId}/updateEmergencyContact', [PatientController::class, 'updateEmergencyContact'])->name('patients.updateEmergencyContact'); // Update emergency contact
Route::post('/patients/{patientId}/approve', [PatientController::class, 'approveRegistration'])->name('patients.approve'); // Approve patient registration

// ======== Registration Approval Routes ========
Route::get('/registration-approval', [RegistrationApprovalController::class, 'index'])->name('registrationapproval.index'); // Registration approval list
Route::post('/patients/{patientId}/approve', [RegistrationApprovalController::class, 'approve'])->name('patients.approve'); // Approve patient registration
Route::post('/patients/{patientId}/reject', [RegistrationApprovalController::class, 'reject'])->name('patients.reject'); // Reject patient registration

// ======== Roster Routes ========
Route::get('/rosters', [RosterController::class, 'index'])->name('rosters.index'); // Roster overview
Route::get('/rosters/view', [RosterController::class, 'viewRoster'])->name('rosters.view'); // View roster

// ======== Doctor Routes ========
Route::get('/doctorshome', [DoctorController::class, 'index'])->name('doctorshome.index'); // Doctor's homepage
Route::get('/patientofdoc', [DoctorController::class, 'patients'])->name('patientofdoc.index'); // Patient list for doctor
Route::get('/caregivershome', [DoctorController::class, 'patients'])->name('caregivershome.index'); // Caregiver's homepage

// ======== Miscellaneous Routes ========
Route::get('/searchpatient', function () {
    return view('searchpatient');
}); // Search patient page

Route::get('/searchemployee', function () {
    return view('searchemployee');
});


// Route::get('/patientshome', function () {
//     return view('patientshome');
// });

// Route::get('/patientinfo', function () {
//     return view('patientinfo');
// });

// Route::get('/doctorsappointment', function () {
//     return view('doctorsappointment');
// });



// Route::get('/employeeinfo', function () {
//     return view('employeeinfo');
// });

// Route::get('/rolecreation', function () {
//     return view('rolecreation');
// });

// Route::get('/editroles', function () {
//     return view('editroles');
// });



// Route::get('/registrationapproval', function () {
//     return view('registrationapproval');
// });

// Route::get('/newroster', function () {
//     return view('newroster');
// });

// Route::get('/rosters', function () {
//     return view('rosters');
// });

// Route::get('/editroster', function () {
//     return view('editroster');
// });

// Route::get('/payments', function () {
//     return view('payments');
// });

// Route::get('/familyhome', function () {
//     return view('familyhome');
// });

// Route::get('/adminreport', function () {
//     return view('adminreport');
// });

// Route::get('/createprescription', function () {
//     return view('createprescription');
// });

// Route::get('/patientofdoc', function () {
//     return view('patientofdoc');
// });

// Route::get('/caregivershome', function () {
//     return view('caregivershome');
// });

// Route::get('/familypayment', function () {
//     return view('familypayment');
// });
