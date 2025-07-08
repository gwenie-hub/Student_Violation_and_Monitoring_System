<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('violations', function (Blueprint $table) {
        $table->id();

        $table->foreignId('student_id')
              ->constrained()
              ->onDelete('cascade'); // Deletes violations if student is deleted

        $table->enum('type', ['major', 'minor'])->index();
        $table->string('description');
        $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending')->index();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
