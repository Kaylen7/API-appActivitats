<?php

use App\Models\Usuari;
use App\Models\Activitat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asistencia_usuari_activitats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Activitat::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Usuari::class)->constrained()->cascadeOnDelete();
            $table->string('nom_usuari')->references('nom')->on('usuaris');
            $table->string('nom_activitat')->references('nom')->on('activitats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia_usuari_activitats');        
    }
};
