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
        Schema::create('livrer', function (Blueprint $table) {
            $table->integer('id_fournisseur')->unsigned();
            $table->integer('id_medicamment')->unsigned();
            $table->date('date_livre');
            $table->integer('quantite');
            $table->float('montant');
        
            $table->primary(['id_medicamment', 'id_fournisseur', 'date_livre']);
            $table->foreign('id_medicamment')->references('id_medicamment')->on('medicamment');
            $table->foreign('id_fournisseur')->references('id_fournisseur')->on('fournisseur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livrer');
    }
};
