<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\ActivitatController;
use App\Http\Controllers\ExportImportController;
use App\Http\Controllers\ActivitatUsuariController;

Route::apiResource('usuaris', UsuariController::class);
Route::apiResource('activitats', ActivitatController::class);
Route::post('/activitats/{id}/afegir-usuaris', [ActivitatUsuariController::class, 'afegirUsuaris']);
Route::post('/activitats/{id}/treure-usuaris', [ActivitatUsuariController::class, 'treureUsuaris']);
Route::post('/importar-json', [ExportImportController::class, 'importarJson']);
Route::get('/exportar-json', [ExportImportController::class, 'exportarJson']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
