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
            $table->bigIncrements('id_batiment');
            $table->integer('nbre_niveau')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('batiment');
    }
};

