<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasaDeSementesTable extends Migration
{
   public function up()
    {
        Schema::create('casa_de_sementes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->string('responsavel')->nullable();
            $table->string('contato')->nullable();
            
            // Campos para as coordenadas geográficas
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);

            // Coluna para o administrador aprovar o ponto no mapa
            $table->boolean('aprovado')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casa_de_sementes');
    }
}
