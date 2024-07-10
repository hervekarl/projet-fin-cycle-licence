<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('id_patient');
            $table->string('nom_patient');
            $table->string('prenom_patient');
            $table->integer('age_patient');
            $table->string('sexe_patient');
            $table->string('adresse_patient');
            $table->bigInteger('tel_patient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient');
    }
};
