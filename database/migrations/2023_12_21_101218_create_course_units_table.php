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
        if (!Schema::hasTable('course_units')) {
            Schema::create('course_units', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('course_id'); // Foreign key column
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

                $table->unsignedBigInteger('unit_id'); // Foreign key column
                $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_units');
    }
};
