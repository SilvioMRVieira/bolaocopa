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
    Schema::create('premios', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_bolao');
        $table->string('descricao');
        $table->decimal('valor_total', 10, 2);
        $table->string('regra_divisao')->nullable(); // JSONou texto
        $table->timestamps();

        $table->foreign('id_bolao')->references('id')->on('boloes')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premios');
    }
};
