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
        Schema::create('equipement', function (Blueprint $table) {
            $table->bigIncrements('id_equipement');
            $table->char('nom_equipement', 32)->nullable();
            $table->string('type_equipement', 128)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipement');
    }
};


