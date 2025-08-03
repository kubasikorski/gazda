<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('login', function () {
    return redirect(route('app.login'));
})->name('login');

Route::prefix('app')->name('app.')->group(function () {
    require __DIR__ . '/settings.php';
    require __DIR__ . '/auth.php';
    require __DIR__ . '/dashboard.php';
    require __DIR__ . '/property.php';
});
