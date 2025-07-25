<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('otp_code')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            $table->boolean('is_otp_verified')->default(false);
        });
        
    }
    

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['otp', 'otp_expires_at']);
    });
}

};
