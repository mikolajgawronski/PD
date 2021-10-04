<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TournamentController extends Controller
{
    public function index(): View
    {
        $tournaments = Tournament::query()->get();

        return view("tournaments.index", [
            "tournaments" => $tournaments,
        ]);
    }

    public function create(): View
    {
        $games = Game::query()->orderBy("name")->get();

        return view("tournaments.create", [
            "games" => $games,
        ]);
    }

    public function store(Request $request)
    {
        $tournament = new Tournament();
        $tournament->name = $request->name;
        $tournament->description = $request->description;
        $tournament->game_id = $request->game_id;
        $tournament->current_players = 0;
        $tournament->max_players = $request->max_players;
        $tournament->date = $request->date;
        $tournament->time = $request->time;
        $tournament->save();

        return redirect("/tournaments")->with("message", "Pomyślnie dodano turniej.");
    }

    public function show($id): View
    {
        $tournament = Tournament::query()->findOrFail($id)->get();

        return view("tournaments.show", [
            "tournament" => $tournament,
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

    public function destroy($id)
    {
        Tournament::query()->findOrFail($id)->delete();

        return redirect("/tournaments")->with("message", "Pomyślnie usunięto turniej.");
    }
}
