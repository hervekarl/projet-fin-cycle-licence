<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function u(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            // $table->integer("grade_id");
            // $table->string("grade_name");
            // $table->string("inventory");

            // $table->integer("inventory");
            // $table->integer("inventory");
            // $table->integer("inventory");
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
