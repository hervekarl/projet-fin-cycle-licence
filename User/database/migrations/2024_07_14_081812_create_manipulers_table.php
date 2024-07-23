<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function p(): void
    {
        Schema::create('manipuler', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->integer('id_module')->unsigned();
        
            $table->primary(['id_user', 'id_module']);
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_module')->references('id_module')->on('module');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manipuler');
    }
};
