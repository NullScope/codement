<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Disciplina;
use App\Aula;
use App\Ficheiro;
use App\Http\Resources\FicheiroResource;

/**
 * @group Aula management
 *
 * APIs for managing Aulas
 */
class AulaFicheiroController extends Controller
{
    /**
     * Display all Ficheiros of Aula.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($disciplina_id, $aula_id)
    {
        try {
            return FicheiroResource::collection(Disciplina::findOrFail($disciplina_id)->aulas()->findOrFail($aula_id)->ficheiros);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'id_not_found',
            ));
        }
    }

    /**
     * Create Ficheiro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @param  int  $aula_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplina_id, $aula_id)
    {
        try {
            $aula = Disciplina::findOrFail($disciplina_id)->aulas()->findOrFail($aula_id);
            $ficheiro = Ficheiro::create($request->all());

            $aula->ficheiros->save($ficheiro);

            return new FicheiroResource($aula);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'id_not_found',
            ));
        }
    }

    /**
     * Display a Ficheiro of Aula.
     *
     * @param  int  $disciplina_id
     * @param  int  $aula_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function show($disciplina_id, $aula_id, $ficheiro_id)
    {
        try {
            $aula = Disciplina::findOrFail($disciplina_id)->aulas()->findOrFail($aula_id);
            return new FicheiroResource($aula->ficheiros()->findOrFail($ficheiro_id));
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'id_not_found',
            ));
        }
    }

    /**
     * Update a Ficheiro of Aula.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @param  int  $aula_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplina_id, $aula_id, $ficheiro_id)
    {
        try {
            $aula = Disciplina::findOrFail($disciplina_id)->aulas()->findOrFail($aula_id);
            $ficheiro = $aula->ficheiros()->findOrFail($ficheiro_id);
            $ficheiro->update($request->all());

            return new FicheiroResource($ficheiro);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'id_not_found',
            ));
        }
    }

    /**
     * Remove a Ficheiro of Aula.
     *
     * @param  int  $disciplina_id
     * @param  int  $aula_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplina_id, $aula_id, $ficheiro_id)
    {
        try {
            $aula = Disciplina::findOrFail($disciplina_id)->aulas()->findOrFail($aula_id);
            $ficheiro = $aula->ficheiros()->findOrFail($ficheiro_id);
            $ficheiro->delete();

            return response()->json(['success'], 200);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'id_not_found',
            ));
        }
    }
}
