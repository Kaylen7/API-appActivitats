<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\AsistenciaActivitatResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivitatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'descripcio' => $this->descripcio,
            'data_creacio' => $this->data_creacio,
            'data_esdeveniment' => $this->data_esdeveniment,
            'creat_per' => $this->creat_per,
            'asistents' => AsistenciaActivitatResource::collection($this->whenLoaded('asistencia_usuari')),
            'capacitat_maxima' => $this->capacitat_maxima
        ];
    }
}
