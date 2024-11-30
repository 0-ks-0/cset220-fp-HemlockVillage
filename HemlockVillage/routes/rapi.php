<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Route;

Route::resource("/api/signup", SignupAPI::class);
Route::resource("/api/users", UserAPI::class);
