<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('student_records', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'declined'])->default('pending')->after('Notify_Status');
        });
    }

    public function down(): void
    {
        Schema::table('student_records', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
