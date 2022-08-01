<?php

use App\Http\Controllers\QRController;
use App\Http\Controllers\ParCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/parcode', [ParCodeController::class, 'index']);
Route::get('/', [QRController::class, 'index'])->name('qr-form');
Route::post('/generate-qr-image', [QRController::class, 'generate'])->name('generate-qr-image');
//Route::post('/generate-qr-image', [QRController::class, 'generate'])->name('generate-qr-image');
