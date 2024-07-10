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
        Schema::create('employe', function (Blueprint $table) {
            $table->increments('id_employe');
            $table->string('nom_employe');
            $table->string('prenom_employe');
            $table->string('sexe_employe');
            $table->string('adresse_employe');
            $table->bigInteger('tel_employe');
            $table->date('date_naiss_employe');
            $table->integer('compte_employe');
            $table->float('salaire_employe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employe');
    }
};
