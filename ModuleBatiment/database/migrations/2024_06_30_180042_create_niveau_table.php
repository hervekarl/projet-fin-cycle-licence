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
            $table->bigIncrements('id_niveau');
            $table->bigInteger('numero_etage')->nullable();
            $table->bigInteger('nbre_salle')->nullable();
            $table->bigInteger('id_batiment')->unsigned()->nullable();

            $table->foreign('id_batiment')->references('id_batiment')->on('batiment');
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveau');
    }
};