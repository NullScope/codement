<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('alunos', 'API\AlunoController');
Route::apiResource('alunos.disciplinas', 'API\AlunoDisciplinaController');

Route::apiResource('professores', 'API\ProfessorController');
Route::apiResource('professores.disciplinas', 'API\ProfessorDisciplinaController');

Route::apiResource('disciplinas', 'API\DisciplinaController');
Route::apiResource('disciplinas.aulas', 'API\AulaController');
Route::apiResource('disciplinas.aulas.ficheiros', 'API\AulaFicheiroController');
