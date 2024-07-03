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
        Schema::create('posseder', function (Blueprint $table) {
            $table->bigInteger('id_salle')->unsigned();
            $table->bigInteger('id_equipement')->unsigned();
            $table->date('date_debut');
            $table->date('date_fin')->nullable();

            $table->primary(['id_salle', 'id_equipement', 'date_debut']);

            $table->foreign('id_salle')->references('id_salle')->on('salle');
            $table->foreign('id_equipement')->references('id_equipement')->on('equipement');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posseder');
    }
};

