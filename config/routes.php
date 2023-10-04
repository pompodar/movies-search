<?php
use App\Kernel\Route\Route;
use App\Controllers\HomeController;

return [
    // :: is not static signature, no explanation for this
    Route::get('/home', [HomeController::class, 'index']),
];