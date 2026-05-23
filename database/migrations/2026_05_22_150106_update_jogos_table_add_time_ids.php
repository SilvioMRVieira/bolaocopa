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
            $table->unsignedBigInteger('id_time_a')->after('id');
            $table->unsignedBigInteger('id_time_b')->after('id_time_a');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
