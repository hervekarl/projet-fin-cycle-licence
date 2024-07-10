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
        Schema::create('medicamment', function (Blueprint $table) {
            $table->increments('id_medicamment');
            $table->string('intitule_medicamment');
            $table->integer('quantite_medicamment');
            $table->string('categorie_medicamment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamment');
    }
};
