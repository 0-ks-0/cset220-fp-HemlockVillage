<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string("id", 16);
            $table->unsignedBigInteger("user_id")->unique();
            $table->string("family_code", 16)->unique();
            $table->string("econtact_name", 128);
            $table->string("econtact_phone", 20);
            $table->string("econtact_relation", 50);
            $table->timestamps();

            $table->primary("id");
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });

        DB::statement("ALTER TABLE patients ADD CONSTRAINT chk_patient_id_length CHECK (LENGTH(id) = 16)");
        DB::statement("ALTER TABLE patients ADD CONSTRAINT chk_family_code_length CHECK (LENGTH(family_code) = 16)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
