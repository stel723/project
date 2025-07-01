<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function saveGame(Request $request) {
    $gameState = $request->game_state;
    // Сохранение в БД
    return response()->json(['status' => 'success']);
}
}
 