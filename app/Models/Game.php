<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function categories(): BelongsTo
    {
        return $this->BelongsTo(Categories::class);
    }

    public function getCategories()
    {
        $categories = Categories::query()->findOrFail($this->categories_id);

        $value = [];

        if ($categories->is_strategic !== null) {
            array_push($value, "Strategiczna");
        }
        if ($categories->is_for_children !== null) {
            array_push($value, "Dla dzieci");
        }
        if ($categories->is_for_families !== null) {
            array_push($value, "Rodzinna");
        }
        if ($categories->is_economic !== null) {
            array_push($value, "Ekonomiczna");
        }
        if ($categories->is_coop !== null) {
            array_push($value, "Kooperacyjna");
        }
        if ($categories->is_party !== null) {
            array_push($value, "Imprezowa");
        }
        if ($categories->is_euro !== null) {
            array_push($value, "Euro");
        }
        if ($categories->is_ameritrash !== null) {
            array_push($value, "Ameritrash");
        }

        return implode(", ", $value);
    }
}
