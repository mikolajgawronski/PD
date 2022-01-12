<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("games", function (Blueprint $table): void {
            $table->id();
            $table->string("name");
            $table->longText("description")->nullable();
            $table->string("box");
            $table->float("rating_bgg")->nullable();
            $table->float("complexity_bgg")->nullable();
            $table->integer("min_players");
            $table->integer("max_players");
            $table->integer("min_time");
            $table->integer("max_time");
            $table->string("photo")->nullable();
            $table->unsignedBigInteger("categories_id");
            $table->foreign("categories_id")->references("id")->on("categories")
                ->onDelete("cascade");
            $table->boolean("available");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("games");
    }
}
