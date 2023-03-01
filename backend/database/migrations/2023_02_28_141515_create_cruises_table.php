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
        Schema::create('cruises', function (Blueprint $table) {
            $table->id('id_cruise');
            $table->string('name');
            $table->float('price');
            $table->string('picture');
            $table->integer('nights_number');
            $table->date('start_date');
            $table->string('ports');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cruises');
    }
};
