<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Categories;
use App\Models\Game;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function filter(Request $request): View
    {
        if ($request->is_economic === "on") {
            //dd($request);

            $games = Game::query()->whereHas("categories", fn($query) => $query->where("is_economic", "=", 1))->get();
        }

//        dd($games = Game::query()->get(), 'nie');
//
//        $games = Game::query()->get();

        return view("games.index", [
            "games" => $games,
        ]);
    }

    public function create(): View
    {
        return view("games.create");
    }

    public function store(GameRequest $request)
    {
        $categories = new Categories();
        $categories->createFromRequest($request);

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
        $game->categories_id = $categories->id;
        $game->available = true;
        $game->save();

        return redirect("/games")->with("message", "Pomyślnie dodano grę.");
    }

    public function show($id): View
    {
        $game = Game::query()->findOrFail($id);

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

    public function destroy($id)
    {
        Game::query()->findOrFail($id)->delete();

        return redirect("/games")->with("message", "Pomyślnie usunięto grę.");
    }

    public function borrow($id)
    {
        $game = Game::query()->findOrFail($id);
        $game->available = false;
        $game->save();

        $rental = new Rental();
        $rental->user_id = Auth::user()->id;
        $rental->game_id = $game->id;
        $rental->approved = false;
        $rental->save();

        return redirect("/games")->with("message", "Pomyślnie wypożyczono grę.");
    }
}
