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
        Schema::create('incidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->date('record_date');
            $table->integer('entry_time')->nullable();
            $table->integer('exit_time')->nullable();
            $table->decimal('overtime_hours', 5, 2)->nullable();
            $table->decimal('sunday_premium', 8, 2)->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->string('reason');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidences');
    }
};
