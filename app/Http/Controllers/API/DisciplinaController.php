<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Disciplina;
use App\Http\Resources\DisciplinaResource;

/**
 * @group Disciplina management
 *
 * APIs for managing Disciplinas
 */
class DisciplinaController extends Controller
{
    /**
     * Display all Disciplinas.
     *
     * @apiResourceCollection App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @responseFile responses/disciplinas.index.json
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DisciplinaResource::collection(Disciplina::all());
    }

    /**
     * Create a Disciplina.
     *
     * @apiResourceCollection App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @bodyParam nome string required
     * @bodyParam semestre_curricular date required
     * @authenticated
     * @responseFile responses/disciplinas.get.json
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()) {
            $validator = Validator::make($request->all(), [
                'nome' => ['required', 'string', 'max:255'],
                'semestre_curricular' => ['required', 'date'],
            ]);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $disciplina = Disciplina::create([
                    'professor_id' => auth()->user()->userable->id,
                    'nome' => $request->input('nome'),
                    'semestre_curricular' => $request->input('semestre_curricular')
                ]);

                return new DisciplinaResource($disciplina);
            }
        } else {
            return response()->json(array(
                'error' => true,
                'status_code' => 401,
                'response' => 'not_authorized',
            ));
        }
    }

    /**
     * Display a Disciplina.
     *
     * @apiResourceCollection App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @urlParam disciplina required Example: 1
     * @responseFile responses/disciplinas.get.json
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new DisciplinaResource(Disciplina::findOrFail($id));
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
     * Update a Disciplina.
     *
     * @apiResourceCollection App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @urlParam disciplina required Example: 1
     * @responseFile responses/disciplinas.get.json
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $disciplina = Disciplina::findOrFail($id);
            $disciplina->update($request->all());

            return new DisciplinaResource($disciplina);
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
     * Remove a Disciplina.
     *
     * @apiResourceCollection App\Http\Resources\DisciplinaResource
     * @apiResourceModel App\Disciplina
     * @urlParam disciplina required Example: 1
     * @response {
     *  "error": false,
     *  "status_code": 200,
     *  "response": "disciplina_destroyed"
     * }
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $disciplina = Disciplina::findOrFail($id);
            $disciplina->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'disciplina_destroyed',
            ));
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'disciplina_id_not_found',
            ));
        }
    }
}
