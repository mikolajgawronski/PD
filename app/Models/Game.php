<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        "name",
        "rating_bgg",
        "complexity_bgg",
        "min_players",
        "max_players",
        "min_time",
        "max_time",
        "available",
    ];

    public function tournament(): HasMany
    {
        return $this->hasMany(Tournament::class);
    }

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function rental(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
