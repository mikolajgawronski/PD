<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Room extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        "name",
        "game_id",
        "meeting_id",
        "current_players",
        "max_players",
        "play_date",
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }

    public function playerList(): HasMany
    {
        return $this->hasMany(PlayerList::class);
    }

    public function getGameName()
    {
        return Game::query()->where("id", $this->game_id)->value("name");
    }

    public function checkIfJoined($id): bool
    {
        $players = PlayerList::query()->get();
        $userID = Auth::user()->id;

        foreach ($players as $player) {
            if ($player["user_id"] === $userID && $player["room_id"] === $id) {
                return true;
            }
        }

        return false;
    }
}
