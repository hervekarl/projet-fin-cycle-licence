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
        Schema::create('acheter', function (Blueprint $table) {
            $table->integer('id_patient')->unsigned();
            $table->integer('id_medicamment')->unsigned();
            $table->date('date_achat');
            $table->integer('quantite');
            $table->float('prix_unitaire');
        
            $table->primary(['id_patient', 'id_medicamment', 'date_achat']);
            $table->foreign('id_patient')->references('id_patient')->on('patient');
            $table->foreign('id_medicamment')->references('id_medicamment')->on('medicamment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acheter');
    }
};
