<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;

Route::resource("/api/signup", SignupAPI::class);
Route::resource("/api/users", UserAPI::class);

Route::get('/api/patients', [PatientController::class, 'getPatients'])->name('api.patients');
