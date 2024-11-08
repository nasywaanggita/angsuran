<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AngsuranController;

    Route::get('/', [AngsuranController::class, 'index']);
Route::post('/calculate', [AngsuranController::class, 'calculate'])->name('calculate');
