<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{
    public function index(): View
    {
        $games = Game::query()->get();

        return view("games", [
            "games" => $games,
        ]);
    }

    public function create(): void
    {
        //
    }

    public function store(Request $request): void
    {
        //
    }

    public function show($id): View
    {
        $game = Game::query()->findOrFail($id)->get();

        return view("game", [
            "game" => $game,
        ]);
    }

    public function edit($id): void
    {
        //
    }

    public function update(Request $request, $id): void
    {
        //
    }

    public function destroy($id): void
    {
        //
    }
}
