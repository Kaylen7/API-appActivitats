<?php

namespace App\Models;

use App\Models\Usuari;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activitat extends Model
{
    /** @use HasFactory<\Database\Factories\ActivitatFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'descripcio',
        'data_esdeveniment',
        'creat_per',
        'asistents',
        'capacitat_maxima'
    ];

    public function asistencia_usuari(){
        return $this->belongsToMany(Usuari::class, table:"asistencia_usuari_activitats")->withPivot('usuari_id', 'nom_usuari');
    }
}
