<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia()->render('Public/Home', [
        'message' => 'Hello everyone',
    ]);
});
