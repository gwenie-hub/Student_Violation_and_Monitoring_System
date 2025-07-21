<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_records', function (Blueprint $table) {
            $table->id();
            $table->string('Student_ID')->comment('Format: YYYY-NNNNN, e.g., 2022-00101');
            $table->string('First_Name');
            $table->string('Middle_Name')->nullable();
            $table->string('Last_Name');
            $table->string('Course');
            $table->string('Major')->nullable();
            $table->string('Year_and_Section');
            $table->string('Student_Email');
            $table->string('Parent_Email');
            $table->text('Violation')->nullable(); // For long dropdown values
            $table->enum('Offense_Record', ['1st Offense', '2nd Offense', '3rd Offense', '4th Offense'])->nullable();
            $table->enum('Notify_Status', ['Sent', 'Not Sent'])->default('Not Sent');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_records');
    }
};
