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

        return view("games.index", [
            "games" => $games,
        ]);
    }

    public function create(): View
    {
        return view("games.create");
    }

    public function store(Request $request): void
    {
        $game = new Game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->box = $request->box;
        $game->rating_bgg = $request->rating_bgg;
        $game->complexity_bgg = $request->complexity_bgg;
        $game->min_players = $request->min_players;
        $game->max_players = $request->max_players;
        $game->min_time = $request->min_time;
        $game->max_time = $request->max_time;
        $game->available = true;
        $game->save();
    }

    public function show($id): View
    {
        $game = Game::query()->findOrFail($id)->get();

        return view("games.show", [
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
