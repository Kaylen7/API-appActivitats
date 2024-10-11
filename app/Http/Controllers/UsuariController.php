<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use App\Http\Resources\UsuariResource;
use App\Http\Requests\StoreUsuariRequest;
use App\Http\Requests\UpdateUsuariRequest;

class UsuariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UsuariResource::collection(Usuari::with('activitats')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuariRequest $request)
    {
        $usuari = Usuari::create($request->validated());
        $activitat->load('asistencia');

        return UsuariResource::make($usuari);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuari $usuari)
    {
        return UsuariResource::make($usuari);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuariRequest $request, Usuari $usuari)
    {
        if ($request->toArray() === []){
            return response()->json(['message' => "No s'ha modificat cap dada."], 422);
        }
        $usuari->update($request->validated());
        return UsuariResource::make($usuari);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuari $usuari)
    {
        $usuari->delete();
        return response()->json(['message' => 'Usuària eliminada amb èxit.']);
    }
}
