<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppointmentController;

Route::apiResource('appointments', AppointmentController::class);