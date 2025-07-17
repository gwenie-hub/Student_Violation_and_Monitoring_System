<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('archived_student_violations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('reported_by')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('course');
            $table->string('year_section');
            $table->string('violation');
            $table->string('offense_type');
            $table->string('status')->nullable();
            $table->string('sanction');
            $table->timestamps();
    
            // Foreign key constraints (optional)
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reported_by')->references('id')->on('users')->onDelete('set null');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('archived_student_violations');
    }
};
