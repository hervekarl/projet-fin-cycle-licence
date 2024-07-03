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
            $table->bigIncrements('id_salle');
            $table->string('nom_salle', 128)->nullable();
            $table->string('type_salle', 128)->nullable();
            $table->bigInteger('id_niveau')->unsigned()->nullable();

            $table->foreign('id_niveau')->references('id_niveau')->on('niveau');
        });
    }

    public function down()
    {
        Schema::dropIfExists('salle');
    }
};



