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
        Schema::create('niveau', function (Blueprint $table) {
            $table->increments('id_niveau');
            $table->integer('numero_etage');
            $table->integer('nbre_salle');
            $table->integer('id_batiment')->unsigned();

            $table->foreign('id_batiment')->references('id_batiment')->on('batiment');
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveau');
    }
};