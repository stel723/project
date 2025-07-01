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
    public function show() {
    $cards = [
        ['rank' => 'A', 'suit' => 'hearts', 'x' => 50, 'y' => 50],
        ['rank' => 'K', 'suit' => 'spades', 'x' => 200, 'y' => 50]
    ];

    return view('game', ['cards' => $cards]);
}
}
 