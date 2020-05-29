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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('alunos', 'API\AlunoController');
Route::resource('alunos.disciplinas', 'API\AlunoDisciplinaController')->only([
    'index', 'store', 'show', 'destroy'
]);

Route::apiResource('professores', 'API\ProfessorController');
Route::resource('professores.disciplinas', 'API\ProfessorDisciplinaController')->only([
    'index', 'store', 'show', 'destroy'
]);;

Route::apiResource('disciplinas', 'API\DisciplinaController');
Route::apiResource('disciplinas.aulas', 'API\AulaController');
Route::apiResource('disciplinas.aulas.ficheiros', 'API\AulaFicheiroController');

Route::apiResource('disciplinas.duvidas', 'API\DuvidaController');
Route::apiResource('disciplinas.duvidas.ficheiros', 'API\DuvidaFicheiroController');

Route::apiResource('disciplinas.eventos-de-avaliacao', 'API\EventoDeAvaliacaoController');
Route::apiResource('disciplinas.eventos-de-avaliacao.ficheiros', 'API\EventoDeAvaliacaoFicheiroController');
Route::apiResource('disciplinas.eventos-de-avaliacao.resolucoes', 'API\ResolucaoController');
Route::apiResource('disciplinas.eventos-de-avaliacao.resolucoes.ficheiros', 'API\ResolucaoFicheiroController');

Route::resource('ficheiros', 'API\FicheiroController')->only([
    'index', 'show', 'update', 'destroy'
]);
Route::apiResource('ficheiros.comentarios', 'API\ComentarioController');

Route::resource('me', 'API\ProfileController')->only([
    'index'
]);
