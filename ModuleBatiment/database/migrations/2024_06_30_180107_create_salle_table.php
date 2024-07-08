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
        Schema::create('salle', function (Blueprint $table) {
            $table->increments('id_salle');
            $table->char('nom_salle', 32);
            $table->string('type_salle', 128);
            $table->integer('id_niveau')->unsigned();

            $table->foreign('id_niveau')->references('id_niveau')->on('niveau');
        });
    }

    public function down()
    {
        Schema::dropIfExists('salle');
    }
};



