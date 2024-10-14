<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use App\Models\Activitat;
use Illuminate\Http\Request;
use App\Http\Requests\ImportRequest;

class ExportImportController extends Controller
{
    public function importarJson(ImportRequest $request){

        $file = $request->file('arxiu');
        $data = json_decode(file_get_contents($file), true);

        if(is_null($data)){
            return response()->json(['error' => 'Invalid JSON format'], 400);
        }

        try {
            if($request->tipus === 'usuaris'){
                foreach($data['usuaris'] as $dataUsuari){
                    Usuari::create($dataUsuari);
                }
            }elseif($request->tipus === 'activitats'){
                foreach($data['activitats'] as $dataActivitat){
                    Activitat::create($dataActivitat);
                }
            }
            return response()->json(['message' => "JSON importat correctament"], 200);
        } catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function exportarJson(){
        $data = [
            'activitats' => $activitats = Activitat::with('asistencia_usuari')->get()
        ];

        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        return response($jsonData, 200)
        ->header('Content-Type', 'application/json')
        ->header('Content-Disposition', 'attachment; filename="activitats.json"');
    }
}
