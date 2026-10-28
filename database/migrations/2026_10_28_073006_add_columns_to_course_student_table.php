<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->date('enrolled_at')->nullable();

            $table->unique(['student_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['course_id']);
            $table->dropUnique(['student_id', 'course_id']);

            $table->dropColumn([
                'student_id',
                'course_id',
                'enrolled_at',
            ]);
        });
    }
};
