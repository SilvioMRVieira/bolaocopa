<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('jogos', function (Blueprint $table) {
        $table->dropColumn(['time_a', 'time_b']);
    });
}

public function down(): void
{
    Schema::table('jogos', function (Blueprint $table) {
        $table->string('time_a');
        $table->string('time_b');
    });
}
};
