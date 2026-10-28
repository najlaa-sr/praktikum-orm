<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('nim', 20)->unique();
            $table->string('name');

            $table->foreignId('study_program_id')
                ->constrained('study_programs')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['study_program_id']);
            $table->dropUnique(['nim']);
            $table->dropColumn([
                'nim',
                'name',
                'study_program_id',
            ]);
        });
    }
};
