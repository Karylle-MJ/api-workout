<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

Route::prefix('schedule')->group(function () {
    Route::get('/',       [ScheduleController::class, 'index']);        // GET /api/schedule
    Route::get('/today',  [ScheduleController::class, 'today']);        // GET /api/schedule/today
    Route::get('/{day}',  [ScheduleController::class, 'show'])          // GET /api/schedule/monday
        ->where('day', '^(monday|tuesday|wednesday|thursday|friday|saturday|sunday)$');
    Route::put('/{day}',  [ScheduleController::class, 'update'])        // PUT /api/schedule/monday
        ->where('day', '^(monday|tuesday|wednesday|thursday|friday|saturday|sunday)$');
});
