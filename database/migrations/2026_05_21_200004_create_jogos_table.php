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
    Schema::create('jogos', function (Blueprint $table) {
        $table->id();
        $table->string('time_a');
        $table->string('time_b');
        $table->integer('gols_time_a')->nullable();
        $table->integer('gols_time_b')->nullable();
        $table->dateTime('data_hora');
        $table->unsignedBigInteger('id_fase');
        $table->unsignedBigInteger('id_bolao');
        $table->string('status')->default('agendado'); // agendado, encerrado, cancelado
        $table->timestamps();

        $table->foreign('id_fase')->references('id')->on('fases')->onDelete('cascade');
        $table->foreign('id_bolao')->references('id')->on('boloes')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
