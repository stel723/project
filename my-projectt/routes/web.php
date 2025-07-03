<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ImageController;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('layouts.app');
});

// Route::post('/upload', [ImageController::class, 'upload']);
// Route::view('/upload', 'upload'); // Для теста формы

Route::post('/upload', function (Request $request) {
    // Валидация
    $request->validate(['image' => 'required|image|max:2048']); // 2MB максимум
    
    // Сохранение файла
    $path = $request->file('image')->store('public/uploads');
    
    // Генерация URL
    $url = Storage::url($path);
    
    return back()->with('url', $url);
});

Route::view('/upload', 'upload'); // Показываем форму

