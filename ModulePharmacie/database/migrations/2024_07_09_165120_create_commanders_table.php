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
        Schema::create('commander', function (Blueprint $table) {
            $table->integer('id_employe')->unsigned();
            $table->integer('id_medicamment')->unsigned();
            $table->date('date_command');
            $table->integer('quantite');
        
            $table->primary(['id_medicamment', 'id_employe', 'date_command']);
            $table->foreign('id_medicamment')->references('id_medicamment')->on('medicamment');
            $table->foreign('id_employe')->references('id_employe')->on('employe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commander');
    }
};
