<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request) {
    $request->validate(['image' => 'required|image|mimes:png']);
    
    // Сохраняем в `storage/app/public/images`  
    $path = $request->file('image')->store('public/images');
    
    // Делаем доступным через `/storage`  
    $url = Storage::url($path);
    
    return "Изображение загружено! URL: <img src='$url'>";
}
}

