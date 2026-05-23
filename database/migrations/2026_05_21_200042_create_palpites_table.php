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
    Schema::create('palpites', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_usuario');
        $table->unsignedBigInteger('id_jogo');
        $table->integer('gols_palpite_a');
        $table->integer('gols_palpite_b');
        $table->integer('pontos')->nullable(); // opcional
        $table->timestamps();

        $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('id_jogo')->references('id')->on('jogos')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palpites');
    }
};
