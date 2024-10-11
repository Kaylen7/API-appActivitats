<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use App\Models\Activitat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ActivitatResource;
use App\Http\Requests\StoreActivitatUsuariRequest;
use App\Http\Requests\DeleteActivitatUsuariRequest;

class ActivitatUsuariController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function afegirUsuaris(StoreActivitatUsuariRequest $request, $id){

        $activitat = Activitat::findOrFail($id);
        $usuaris = Usuari::whereIn('id', $request->validated()->id_usuaris)->get();

        $pivotData = $usuaris->map(function ($usuari) use ($activitat) {
            return [
                'usuari_id' => $usuari->id,
                'nom_usuari' => $usuari->nom,
                'activitat_id' => $activitat->id,
                'nom_activitat' => $activitat->nom
            ];
        });
        DB::table('asistencia_usuari_activitats')->insert($pivotData->toArray());

        $activitat->load('asistencia_usuari');
        return new ActivitatResource($activitat);
    }

    public function treureUsuaris(DeleteActivitatUsuariRequest $request, $id){

        foreach($request->validated()['id_usuaris'] as $usuari_id){
            DB::table('asistencia_usuari_activitats')
            ->where('activitat_id', $id)
            ->where('usuari_id', $usuari_id)
            ->delete();
        }
        

        return response()->json(['message' => "Usuaris eliminats de l'activitat."], 200);
    }
}
