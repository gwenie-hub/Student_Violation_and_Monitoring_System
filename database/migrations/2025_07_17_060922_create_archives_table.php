<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    public function up()
    {
        Schema::table('student_violations', function (Blueprint $table) {
            $table->timestamp('archived_at')->nullable()->after('sanction');
        });
    }
    
    public function down()
    {
        Schema::table('student_violations', function (Blueprint $table) {
            $table->dropColumn('archived_at');
        });
    }
    
}
