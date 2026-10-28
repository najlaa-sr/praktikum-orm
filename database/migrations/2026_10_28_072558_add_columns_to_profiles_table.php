<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->foreignId('student_id')
                ->unique()
                ->constrained('students')
                ->cascadeOnDelete();

            $table->string('phone', 25)->nullable();
            $table->text('address')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropUnique(['student_id']);
            $table->dropColumn([
                'student_id',
                'phone',
                'address',
            ]);
        });
    }
};
