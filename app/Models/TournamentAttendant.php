<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TournamentAttendant extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        "tournament_id",
        "user_id",
    ];

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTournamentName()
    {
        return Tournament::query()->where("id", $this->tournament_id)->value("name");
    }

    public function getGameName()
    {
        $gameId = Tournament::query()->where("id", $this->tournament_id)->value("game_id");

        return Game::query()->where("id", $gameId)->value("name");
    }

    public function getTournamentTime()
    {
        return Tournament::query()->where("id", $this->tournament_id)->value("time");
    }

    public function getTournamentDate()
    {
        return Tournament::query()->where("id", $this->tournament_id)->value("date");
    }
}
