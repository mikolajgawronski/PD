<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("rooms", function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger("game_id");
            $table->foreign("game_id")->references("id")->on("games")
                ->onDelete("cascade");
            $table->unsignedBigInteger("meeting_id");
            $table->foreign("meeting_id")->references("id")->on("meetings")
                ->onDelete("cascade");
            $table->integer("current_players");
            $table->integer("max_players");
            $table->time("time");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("rooms");
    }
}
