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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("employee_id");
            $table->date("date_assigned");
            $table->decimal("salary", 8, 2)->default(0);
            $table->timestamps();

            $table->foreign("employee_id")
                ->references("id")
                ->on("employees")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->unique([ "employee_id", "date_assigned" ]);
        });

        DB::statement("ALTER TABLE `salaries` ADD CONSTRAINT `chk_salary` CHECK( `salary` >= 0 )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
