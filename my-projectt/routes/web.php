<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('resources/views/pages/home.blade.php');
});
