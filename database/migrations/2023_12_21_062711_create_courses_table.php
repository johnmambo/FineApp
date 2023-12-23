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
        if (!Schema::hasTable('courses')) {
            Schema::create('courses', function (Blueprint $table) {
                $table->id();
                $table->string('course_name');
                $table->string('course_code');
                $table->string('course_type');
                $table->string('course_capacity');
                $table->integer('maximum_lessons')->nullable();
                $table->unsignedBigInteger('department_id'); // Foreign key column
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
