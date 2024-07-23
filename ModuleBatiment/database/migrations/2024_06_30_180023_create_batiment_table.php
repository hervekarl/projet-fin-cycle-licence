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
        Schema::create('batiment', function (Blueprint $table) {
            $table->increments('id_batiment');
            $table->string('nom_batiment')->unique();
            $table->integer('nbre_niveau');
        });
    }

    public function down()
    {
        Schema::dropIfExists('batiment');
    }
};

