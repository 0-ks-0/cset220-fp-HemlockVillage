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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("patient_id");
            $table->date("last_updated_date");
            $table->decimal("bill", 8, 2)->default(0);
            $table->timestamps();

            $table->foreign("patient_id")
                ->references("id")
                ->on("patients")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->unique("patient_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
