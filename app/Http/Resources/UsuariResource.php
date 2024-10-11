<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\AsistenciaUsuariResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuariResource extends JsonResource
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
            'cognom1' => $this->cognom1,
            'cognom2' => $this->cognom2,
            'aniversari' => $this->aniversari,
            'email' => $this->email,
            'inscripcions' =>  AsistenciaUsuariResource::collection($this->whenLoaded('activitats')),

        ];
    }
}
