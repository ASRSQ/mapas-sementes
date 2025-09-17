<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCultivosAndTelefoneToCasaDeSementesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::table('casa_de_sementes', function (Blueprint $table) {
            $table->json('cultivos_principais')->nullable()->after('contato');
        });
    }

    public function down()
    {
        Schema::table('casa_de_sementes', function (Blueprint $table) {
            $table->dropColumn('cultivos_principais');
        });
    }
}
