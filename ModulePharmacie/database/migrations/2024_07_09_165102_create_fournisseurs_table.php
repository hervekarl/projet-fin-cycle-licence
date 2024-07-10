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
        Schema::create('fournisseur', function (Blueprint $table) {
            $table->increments('id_fournisseur');
            $table->string('nom_fournisseur');
            $table->bigInteger('tel_fournisseur');
            $table->string('adresse_fournisseur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseur');
    }
};
