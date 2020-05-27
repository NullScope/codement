<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Professor;
use App\Disciplina;
use App\Http\Resources\DisciplinaResource;

/**
 * @group Professor management
 *
 * APIs for managing Professores
 */
class ProfessorDisciplinaController extends Controller
{
    /**
     * Display all Disciplinas of Professor.
     *
     * @apiResourceCollection App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @responseFile responses/disciplinas.index.json
     * @urlParam professor required Example: 1
     * @param  int  $professor_id
     * @return \Illuminate\Http\Response
     */
    public function index($professor_id)
    {
        try {
            return DisciplinaResource::collection(Professor::findOrFail($professor_id)->user->disciplinas);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'professor_id_not_found',
            ));
        }
    }

    /**
     * Add a Disciplina to Professor
     *
     * @apiResource App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @responseFile responses/disciplinas.index.json
     * @urlParam professor required Example: 1
     * @bodyParam disciplina_id string required
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $professor_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $professor_id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'disciplina_id' => ['required', 'int'],
            ]);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $professor = Professor::findOrFail($professor_id);
                $disciplina = Disciplina::findOrFail($request->input("disciplina_id"));

                $professor->user->disciplinas()->attach($disciplina);

                return new DisciplinaResource($disciplina);

            }
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
     * Display a Disciplina of Professor.
     *
     * @apiResource App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @urlParam professor required Example: 1
     * @urlParam disciplina required Example: 1
     * @param  int  $professor_id
     * @param  int  $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function show($professor_id, $disciplina_id)
    {
        try {
            $professor = Professor::findOrFail($professor_id);
            return new DisciplinaResource($professor->user->disciplinas()->findOrFail($disciplina_id));
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
     * Update the Disciplina of Professor (NOT IMPLEMENTED).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove a Disciplina from Professor.
     *
     * @apiResource App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @urlParam professor required Example: 1
     * @urlParam disciplina required Example: 1
     * @response {
     *  "error": false,
     *  "status_code": 200,
     *  "response": "disciplina_removed"
     * }
     * @param  int  $professor_id
     * @param  int  $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($professor_id, $disciplina_id)
    {
        try {
            $professor = Professor::findOrFail($id);
            $disciplina = Disciplina::findOrFail($disciplina_id);

            $professor->user->disciplinas()->detach($disciplina);

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'disciplina_removed',
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
