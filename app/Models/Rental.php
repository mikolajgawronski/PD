<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        "game_id",
        "user_id",
    ];

    public function getGameName()
    {
        return Game::query()->where("id", $this->game_id)->value("name");
    }

    public function getUserName()
    {
        return User::query()->where("id", $this->user_id)->value("username");
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
