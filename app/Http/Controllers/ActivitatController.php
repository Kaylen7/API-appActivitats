<?php

namespace App\Http\Controllers;

use App\Models\Activitat;
use App\Http\Resources\ActivitatResource;
use App\Http\Requests\StoreActivitatRequest;
use App\Http\Requests\UpdateActivitatRequest;

class ActivitatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ActivitatResource::collection(Activitat::with('asistencia_usuari')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivitatRequest $request)
    {
        $activitat = Activitat::create($request->validated());
        $activitat->data_creacio = now();
        $activitat->load('asistencia_usuari');
        
        return ActivitatResource::make($activitat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activitat $activitat)
    {
        $activitat->load('asistencia_usuari');
        
        return ActivitatResource::make($activitat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivitatRequest $request, Activitat $activitat)
    {
        if ($request->toArray() === []){
            return response()->json(['message' => "No s'ha modificat cap dada."], 422);
        }
        $activitat->update($request->validated());
        return ActivitatResource::make($activitat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activitat $activitat)
    {
        $activitat->delete();
        return response()->json(['message' => 'Activitat eliminada amb èxit.']);
    }
}
