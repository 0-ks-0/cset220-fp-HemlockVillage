<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("meal_id");
            $table->unsignedTinyInteger("breakfast");
            $table->unsignedTinyInteger("lunch");
            $table->unsignedTinyInteger("dinner");
            $table->timestamps();

            $table->foreign("meal_id")
                ->references("id")
                ->on("meals")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->foreign("breakfast")
                ->references("id")
                ->on("completion_statuses")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign("lunch")
                ->references("id")
                ->on("completion_statuses")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign("dinner")
                ->references("id")
                ->on("completion_statuses")
                ->onUpdate("cascade")
                ->onDelete("restrict");

            $table->unique("meal_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_statuses');
    }
};
