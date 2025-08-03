<?php

use App\Http\Controllers\Property\PropertyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/property/{property:uuid}', [PropertyController::class, 'show'])->name('property.show');
});
