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
        Schema::create('occuper', function (Blueprint $table) {
            $table->integer('id_salle')->unsigned();
            $table->integer('id_patient')->unsigned();
            $table->date('date_debut');
            $table->date('date_fin')->nullable();

            $table->primary(['id_salle', 'id_patient', 'date_debut']);

            $table->foreign('id_salle')->references('id_salle')->on('salle');
            $table->foreign('id_patient')->references('id_patient')->on('patient');
        });
    }

    public function down()
    {
        Schema::dropIfExists('occuper');
    }
};

