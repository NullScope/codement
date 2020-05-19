<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Disciplina;
use App\Aula;
use App\Http\Resources\AulaResource;

/**
 * @group Aula management
 *
 * APIs for managing Aulas
 */
class AulaController extends Controller
{
    /**
     * Display all Aulas of Disciplina.
     *
     * @apiResourceCollection App\Http\Resources\AulaResource
     * @apiResourceModel App\Aula
     * @responseFile responses/aulas.index.json
     * @urlParam disciplina required Example: 1
     * @param  int  $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function index($disciplina_id)
    {
        try {
            return AulaResource::collection(Disciplina::findOrFail($disciplina_id)->aulas);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'disciplina_id_not_found',
            ));
        }
    }

    /**
     * Create a Aula of Disciplina.
     *
     * @apiResource App\Http\Resources\AulaResource
     * @apiResourceModel App\Aula
     * @urlParam disciplina required Example: 1
     * @bodyParam descricao string required
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplina_id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'descricao' => ['required', 'string', 'max:255']
            ]);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $disciplina = Disciplina::findOrFail($disciplina_id);

                $aula = Aula::create([
                    'disciplina_id' => $disciplina_id,
                    'descricao' => $request->input('descricao')
                ]);

                $disciplina->aulas()->save($aula);

                return new AulaResource($aula);
            }
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'disciplina_id_not_found',
            ));
        }
    }

    /**
     * Display a Aula of Disciplina.
     *
     * @apiResource App\Http\Resources\AulaResource
     * @apiResourceModel App\Aula
     * @urlParam disciplina required Example: 1
     * @urlParam aula required Example: 1
     * @param  int  $disciplina_id
     * @param  int  $aula_id
     * @return \Illuminate\Http\Response
     */
    public function show($disciplina_id, $aula_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            return new AulaResource($disciplina->aulas()->findOrFail($aula_id));
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
     * Update a Aula of Disciplina
     *
     * @apiResource App\Http\Resources\AulaResource
     * @apiResourceModel App\Aula
     * @urlParam disciplina required Example: 1
     * @urlParam aula required Example: 1
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @param  int  $aula_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplina_id, $aula_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            $aula = $disciplina->aulas()->findOrFail($aula_id);
            $aula->update($request->all());

            return new AulaResource($aula);
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
     * Remove a Aula of Disciplina
     *
     * @apiResource App\Http\Resources\AulaResource
     * @apiResourceModel App\Aula
     * @urlParam disciplina required Example: 1
     * @urlParam aula required Example: 1
     * @response {
     *  "error": false,
     *  "status_code": 200,
     *  "response": "aula_destroyed"
     * }
     * @param  int  $disciplina_id
     * @param  int  $aula_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplina_id, $aula_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            $aula = $disciplina->aulas()->findOrFail($aula_id);
            $aula->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'aula_destroyed',
            ));
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