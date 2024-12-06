<?php


namespace App\Http\Controllers\Api;

// use App\Http\Controllers\APIController;

use App\Helpers\ControllerHelper;
use App\Http\Controllers\Regular\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Regular\PatientController;
use App\Http\Controllers\Regular\RegistrationApprovalController; 
use App\Http\Controllers\Regular\EmployeeController;

<<<<<<< Updated upstream
// Existing routes
Route::resource("/api/signup", SignupAPI::class);
Route::resource("/api/users", UserAPI::class);
Route::get('/api/patients', [PatientController::class, 'getPatients'])->name('api.patients');

// New API routes for registration approval
Route::get('/api/patients/unapproved', [RegistrationApprovalController::class, 'apiIndex']); 
Route::post('/api/patients/{patientId}/approve', [RegistrationApprovalController::class, 'apiApprove']);
Route::post('/api/employees/{id}/update-salary', [EmployeeController::class, 'updateSalary'])->name('api.employees.updateSalary');

Route::get('/api/employees/{id}', [EmployeeController::class, 'show'])->name('api.employees.show');

Route::get('/api/patients', [PatientController::class, 'getPatients'])->name('api.patients');

=======
use Carbon\Carbon;
Route::resource("/api/signup", SignupAPI::class);
Route::resource("/api/users", UserAPI::class);


Route::get("/test", function ()
{

});
>>>>>>> Stashed changes
