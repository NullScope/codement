<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Aluno;
use App\Disciplina;
use App\Http\Resources\DisciplinaResource;

/**
 * @group Aluno management
 *
 * APIs for managing Alunos
 */
class AlunoDisciplinaController extends Controller
{
    /**
     * Display all Disciplinas of Aluno.
     *
     * @param  int  $aluno_id
     * @return \Illuminate\Http\Response
     */
    public function index($aluno_id)
    {
        try {
            return DisciplinaResource::collection(Aluno::findOrFail($aluno_id)->user->disciplinas);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'aluno_id_not_found',
            ));
        }
    }

    /**
     * Add a Disciplina to Aluno.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'disciplina_id' => ['required', 'int'],
            ]);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $aluno = Aluno::findOrFail($id);
                $disciplina = Disciplina::findOrFail($request->input('disciplina_id'));

                $aluno->user->disciplinas()->attach($disciplina);

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
     * Display a Disciplina of Aluno.
     *
     * @param  int  $aluno_id
     * @param  int  $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function show($aluno_id, $disciplina_id)
    {
        try {
            $aluno = Aluno::findOrFail($aluno_id);
            return new DisciplinaResource($aluno->user->disciplinas()->findOrFail($disciplina_id));
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
     * Update the Disciplina of Aluno (NOT IMPLEMENTED).
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
     * Remove a Disciplina from Aluno.
     *
     * @param  int  $aluno_id
     * @param  int  $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($aluno_id, $disciplina_id)
    {
        try {
            $aluno = Aluno::findOrFail($id);
            $disciplina = Disciplina::findOrFail($disciplina_id);

            $aluno->disciplinas()->detach($disciplina);

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
