<?php

use App\Http\Controllers\QRController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QRController::class, 'index'])->name('qr-form');
Route::post('/generate-qr-image', [QRController::class, 'generate'])->name('generate-qr-image');
//Route::post('/generate-qr-image', [QRController::class, 'generate'])->name('generate-qr-image');
