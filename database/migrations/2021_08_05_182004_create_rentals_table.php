<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("rentals", function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")
                ->onDelete("cascade");
            $table->unsignedBigInteger("game_id");
            $table->foreign("game_id")->references("id")->on("games")
                ->onDelete("cascade");
            $table->boolean("approved");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("rentals");
    }
}
