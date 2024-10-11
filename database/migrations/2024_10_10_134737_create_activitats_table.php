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
        Schema::create('activitats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->longText('descripcio')->nullable();
            $table->dateTime('data_esdeveniment');
            $table->unsignedBigInteger('creat_per')->nullable();
            $table->integer('capacitat_maxima')->nullable();

            $table->foreign('creat_per')->references('id')->on('usuaris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activitats');
    }
};
