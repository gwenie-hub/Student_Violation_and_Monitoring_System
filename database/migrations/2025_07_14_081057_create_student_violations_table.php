<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_violations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('reported_by'); // 👈 professor ID
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('course');
            $table->string('year_section');
            $table->string('violation');
            $table->enum('offense_type', ['Minor', 'Major']);
            $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
            $table->string('sanction')->nullable(); // 👈 NEW COLUMN ADDED
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_violations');
    }
};
