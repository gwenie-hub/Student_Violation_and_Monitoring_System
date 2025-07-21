<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('student_records', function (Blueprint $table) {
            if (!Schema::hasColumn('student_records', 'Sanction')) {
                $table->string('Sanction')->nullable()->after('Violation');
            }
            if (!Schema::hasColumn('student_records', 'reported_by')) {
                $table->unsignedBigInteger('reported_by')->nullable()->after('Student_ID');
            }
            if (!Schema::hasColumn('student_records', 'status')) {
                $table->enum('status', ['pending', 'approved', 'declined'])->default('pending')->after('Notify_Status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('student_records', function (Blueprint $table) {
            if (Schema::hasColumn('student_records', 'Sanction')) {
                $table->dropColumn('Sanction');
            }
            if (Schema::hasColumn('student_records', 'reported_by')) {
                $table->dropColumn('reported_by');
            }
            if (Schema::hasColumn('student_records', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
