<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;

use App\Http\Middleware\CheckRole;

require("rapi.php");

Route::get("/test", function()
{
    return view("editroster");
});


// Nav bar routes

// ========= Delete ==========
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/patients', [PatientController::class, 'index'])->name('patientinfo.index');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employeeinfo.index');
Route::get('/roster', [RosterController::class, 'index'])->name('roster.index');


Route::get('/', fn() => PageController::landing());

// Signup
Route::get("/signup", fn() => SignupController::index());
Route::post("/signup", fn() => SignupController::store(request()));

// Login
Route::get("/login", fn() => LoginController::showLoginForm())->name("login.form");
Route::post("/login", fn() => LoginController::login(request()));

// Logout
Route::get("/logout", fn() => LoginController::logout(request()));


// Admin and Supervisor Access
Route::middleware([CheckRole::class . ':1,2'])->group( function ()
{
    // Users
    Route::get("/users", fn() => PageController::users());
});

// All Users Access
Route::middleware("auth")->group( function ()
{
    // Home
    Route::get("/home", fn() => PageController::home());
});


// ========= Delete ==========
// Define the routes for each role's homepage
//     Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/home', fn() => view('admin.home'))->name('admin.home');
//     Route::get('/supervisor/home', fn() => view('supervisor.home'))->name('supervisor.home');
//     Route::get('/doctor/home', fn() => view('doctorshome'))->name('doctor.home'); // Doctors' homepage route
//     Route::get('/caregiver/home', fn() => view('caregiver.home'))->name('caregiver.home');
//     Route::get('/family/home', fn() => view('family.home'))->name('family.home');
// });



  //
Route::get('/patients', [PatientController::class, 'index'])->name('patientinfo.index');
Route::get('/rosters', [RosterController::class, 'index'])->name('rosters.index');
Route::get('/rosters/view', [RosterController::class, 'viewRoster'])->name('rosters.view');
Route::get('/doctorshome', [DoctorController::class, 'index'])->name('doctorshome.index');
Route::get('/patientofdoc', [DoctorController::class, 'patients'])->name('patientofdoc.index');




Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');



Route::post('/patients/{patientId}/approve', [PatientController::class, 'approveRegistration'])->name('patients.approve');








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

// Route::get('/searchpatient', function () {
//     return view('searchpatient');
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

// Route::get('/searchemployee', function () {
//     return view('searchemployee');
// });
