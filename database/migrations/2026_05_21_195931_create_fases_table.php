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
    Schema::create('fases', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->integer('ordem')->default(0);
        $table->unsignedBigInteger('id_bolao');
        $table->timestamps();

        $table->foreign('id_bolao')->references('id')->on('boloes')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fases');
    }
};
