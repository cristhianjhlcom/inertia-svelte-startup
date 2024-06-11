<?php

use App\Http\Controllers\DashboardIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia()->render('Guest/Home', [
        'message' => 'Hello everyone',
    ]);
});

Route::get('/dashboard', DashboardIndexController::class);
