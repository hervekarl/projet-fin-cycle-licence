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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('name');
            $table->string('email');
            $table->string('password');

            $table->boolean('can_insert');
            $table->boolean('can_select');
            $table->boolean('can_update');
            $table->boolean('can_delete');
            $table->boolean('is_admin');

            $table->boolean('is_connected');
            
            $table->integer('id_module')->unsigned();

            
            $table->foreign('id_module')->references('id_module')->on('module');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};

