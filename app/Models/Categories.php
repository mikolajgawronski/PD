<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categories extends Model
{
    use HasFactory;

    public function createFromRequest(Request $request): void
    {
        if ($request->is_strategic === "on") {
            $this->is_strategic = 1;
        }
        if ($request->is_for_children === "on") {
            $this->is_for_children = 1;
        }
        if ($request->is_for_families === "on") {
            $this->is_for_families = 1;
        }
        if ($request->is_economic === "on") {
            $this->is_economic = 1;
        }
        if ($request->is_coop === "on") {
            $this->is_coop = 1;
        }
        if ($request->is_party === "on") {
            $this->is_party = 1;
        }
        if ($request->is_euro === "on") {
            $this->is_party = 1;
        }
        if ($request->is_ameritrash === "on") {
            $this->is_ameritrash = 1;
        }

        $this->save();
    }
}
