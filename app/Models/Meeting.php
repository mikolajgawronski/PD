<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meeting extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        "date", "time",
    ];

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
