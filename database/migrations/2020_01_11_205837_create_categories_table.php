<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("categories", function (Blueprint $table): void {
            $table->id();
            $table->boolean("is_strategic")->nullable();
            $table->boolean("is_for_children")->nullable();
            $table->boolean("is_for_families")->nullable();
            $table->boolean("is_economic")->nullable();
            $table->boolean("is_card")->nullable();
            $table->boolean("is_coop")->nullable();
            $table->boolean("is_party")->nullable();
            $table->boolean("is_euro")->nullable();
            $table->boolean("is_ameritrash")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("categories");
    }
}
