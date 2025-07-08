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
        $table->foreignId('student_id')->constrained();
        $table->string('type'); // 'major' or 'minor'
        $table->text('description');
        $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
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
