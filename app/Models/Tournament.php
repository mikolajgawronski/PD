<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Tournament extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        "name",
        "game_id",
        "play_date",
        "current_players",
        "max_players",
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function tournamentAttendants(): HasMany
    {
        return $this->hasMany(TournamentAttendant::class);
    }

    public function checkIfJoined($id): bool
    {
        $attendants = TournamentAttendant::query()->get();
        $userID = Auth::user()->id;

        foreach ($attendants as $attendant) {
            if ($attendant["user_id"] === $userID && $attendant["tournament_id"] === $id) {
                return true;
            }
        }

        return false;
    }
}
