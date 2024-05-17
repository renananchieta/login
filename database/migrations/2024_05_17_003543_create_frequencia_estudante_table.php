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
        Schema::create('frequencia_estudante', function (Blueprint $table) {
            $table->id();
            $table->foreignId("matricula_id")->constrained("matricula_estudante");
            $table->string("ano_referencia", 4);
            $table->string("mes_referencia", 2);
            $table->integer("ch_ofertada");
            $table->integer("ch_presente");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequencia_estudante');
    }
};
