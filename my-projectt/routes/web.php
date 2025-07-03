<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::post('/upload', [ImageController::class, 'upload']);
Route::view('/upload', 'upload'); // Для теста формы