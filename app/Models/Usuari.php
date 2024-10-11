<?php

namespace App\Models;

use App\Models\Activitat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuari extends Model
{
    /** @use HasFactory<\Database\Factories\UsuariFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'cognom1',
        'cognom2',
        'aniversari',
        'email',
        'inscripcions'
    ];

    public function activitats(){
        return $this->belongsToMany(Activitat::class, table:"asistencia_usuari_activitats")->withPivot('activitat_id', 'nom_activitat');
    }
}
