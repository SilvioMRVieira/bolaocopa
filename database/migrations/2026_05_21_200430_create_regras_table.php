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
    Schema::create('regras', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_bolao');
        $table->string('nome_regra');
        $table->integer('valor_pontos');
        $table->text('descritivo')->nullable();
        $table->timestamps();

        $table->foreign('id_bolao')->references('id')->on('boloes')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regras');
    }
};
