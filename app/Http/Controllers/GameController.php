<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Categories;
use App\Models\Game;
use App\Models\GameCategory;
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
        $games = Game::query()->orderBy("name")->get();
        $filters = $this->createFilters($request);

        switch ($request)
        {
            case $request->name !== null:
                $games = $games->toQuery()->where("name", "LIKE", "%{$request->name}%")->get(); break;

            case $request->players !== null:
                $games = $games->toQuery()->where("min_players", "<=", $request->players)->where("max_players", ">=", $request->players)->get(); break;
        }

        foreach ($filters as $filter)
        {
            $categoryId = Categories::query()->where("name", "=", "$filter")->value("id");

            $games = $games->toQuery()->whereHas("gameCategories", fn($query) => $query->where("category_id", "=", $categoryId))->orderBy("name")->get();
        }

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
        $game->available = true;
        $game->save();

        $gameCategories = new GameCategory();
        $gameCategories->createFromRequest($request, $game);

        return redirect("/games")->with("message", "Pomyślnie dodano grę.");
    }

    public function show($id): View
    {
        $game = Game::query()->findOrFail($id);

        return view("games.show", [
            "game" => $game,
        ]);
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

    private function createFilters($request): array
    {
        $filters = [];

        switch ($request)
        {
            case $request->is_strategic === "on":
                array_push($filters, "Strategiczna"); break;

            case $request->is_for_children === "on":
                array_push($filters, "Dla dzieci"); break;

            case $request->is_for_families === "on":
                array_push($filters, "Rodzinna"); break;

            case $request->is_economic === "on":
                array_push($filters, "Ekonomiczna"); break;

            case $request->is_card === "on":
                array_push($filters, "Karciana"); break;

            case $request->is_coop === "on":
                array_push($filters, "Kooperacyjna"); break;

            case $request->is_party === "on":
                array_push($filters, "Imprezowa"); break;

            case $request->is_euro === "on":
                array_push($filters, "Euro"); break;

            case $request->is_ameritrash === "on":
                array_push($filters, "Ameritrash"); break;

        }

        return $filters;
    }
}
