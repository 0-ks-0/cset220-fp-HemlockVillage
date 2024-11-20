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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("appointment_id");
            $table->text("morning")->nullable();
            $table->text("afternoon")->nullable();
            $table->text("night")->nullable();
            $table->timestamps();

            $table->foreign("appointment_id")
                ->references("id")
                ->on("appointments")
                ->onUpdate("cascade")
                ->onDelete("restrict"); // Prevent prescriptions from being lost if appointment was deleted

            $table->unique("appointment_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
