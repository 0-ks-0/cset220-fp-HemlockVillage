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
        Schema::create('prescription_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("prescription_id");
            $table->unsignedTinyInteger("morning");
            $table->unsignedTinyInteger("afternoon");
            $table->unsignedTinyInteger("night");
            $table->timestamps();

            $table->foreign("prescription_id")
                ->references("id")
                ->on("prescriptions")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->foreign("morning")
                ->references("id")
                ->on("completion_statuses")
                ->onUpdate("cascade")
                ->onDelete("restrict"); // Prevent prescription status to be lost if completion status deleted
            $table->foreign("afternoon")
                ->references("id")
                ->on("completion_statuses")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign("night")
                ->references("id")
                ->on("completion_statuses")
                ->onUpdate("cascade")
                ->onDelete("restrict");

            $table->unique("prescription_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_statuses');
    }
};
