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
        $games = Game::query()->orderBy("name")->get();

        return view("games.index", [
            "games" => $games,
        ]);
    }

    public function filter(Request $request): View
    {
        $games = Game::query()->whereHas("categories", fn($query) => $query)->get();

        if ($request->name !== null) {
            $games = $games->toQuery()->where("name", "LIKE", "%{$request->name}%")->get();
        }
        if ($request->players !== null) {
            $games = $games->toQuery()->where("min_players", "<=", $request->players)->where("max_players", ">=", $request->players)->get();
        }
        if ($request->is_strategic === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_strategic", "=", 1))->get();
        }
        if ($request->is_for_children === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_for_children", "=", 1))->get();
        }
        if ($request->is_for_families === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_for_families", "=", 1))->get();
        }
        if ($request->is_economic === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_economic", "=", 1))->get();
        }
        if ($request->is_card === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_card", "=", 1))->get();
        }
        if ($request->is_coop === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_coop", "=", 1))->get();
        }
        if ($request->is_party === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_party", "=", 1))->get();
        }
        if ($request->is_euro === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_euro", "=", 1))->get();
        }
        if ($request->is_ameritrash === "on") {
            $games = $games->toQuery()->whereHas("categories", fn($query) => $query->where("is_ameritrash", "=", 1))->get();
        }

        $games = $games->toQuery()->orderBy("name")->get();

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
        if ($game->photo !== null) {
            $game->photo = $request->photo->store("images", "public");
        }
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
