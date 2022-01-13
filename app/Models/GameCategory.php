<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GameCategory extends Model
{
    use HasFactory;

    public function createFromRequest(Request $request, Game $game): void
    {
        if ($request->is_strategic === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Strategiczna")->value("id");
            $gameCategory->save();
        }
        if ($request->is_for_children === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Dla dzieci")->value("id");
            $gameCategory->save();
        }
        if ($request->is_for_families === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Rodzinna")->value("id");
            $gameCategory->save();
        }
        if ($request->is_economic === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Ekonomiczna")->value("id");
            $gameCategory->save();
        }
        if ($request->is_card === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Karciana")->value("id");
            $gameCategory->save();
        }
        if ($request->is_coop === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Kooperacyjna")->value("id");
            $gameCategory->save();
        }
        if ($request->is_party === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Imprezowa")->value("id");
            $gameCategory->save();
        }
        if ($request->is_euro === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Euro")->value("id");
            $gameCategory->save();
        }
        if ($request->is_ameritrash === "on") {
            $gameCategory = new self();

            $gameCategory->game_id = $game->id;
            $gameCategory->category_id = Categories::query()->where("name", "=", "Ameritrash")->value("id");
            $gameCategory->save();
        }
    }
}
