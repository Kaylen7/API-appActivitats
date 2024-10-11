<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsistenciaUsuariResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    static array $usuaris = [];

    public function toArray(Request $request): array
    {
        return [
            "nom" => $this->pivot->nom_activitat,
            "id" => $this->pivot->id_activitat
        ];
    }
}
