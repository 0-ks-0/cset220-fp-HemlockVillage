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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string("patient_id", 16);
            $table->date("date_admitted");
            $table->timestamps();

            $table->foreign("patient_id")
                ->references("id")
                ->on("patients")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->unique([ "patient_id", "date_admitted" ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
