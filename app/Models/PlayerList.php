<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerList extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        "name",
        "user_id",
        "room_id",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function getGameName()
    {
        $gameId = Room::query()->where("id", $this->room_id)->value("game_id");

        return Game::query()->where("id", $gameId)->value("name");
    }

    public function getRoomTime()
    {
        return Room::query()->where("id", $this->room_id)->value("time");
    }

    public function getMeetingDate()
    {
        $meetingId = Room::query()->where("id", $this->room_id)->value("meeting_id");

        return Meeting::query()->where("id", $meetingId)->value("date");
    }

    public function getUserName()
    {
        return User::query()->where("id", $this->user_id)->value("username");
    }
}
