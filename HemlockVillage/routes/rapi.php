<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Route;

Route::resource("/api/signup", UserAPI::class);
