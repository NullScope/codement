<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Aluno;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DisciplinaResource::collection(Disciplina::all());
    }

    /**
     * Create a Disciplina.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $disciplina = Disciplina::create([
                'name' => $request->input('name')
            ]);

            return new DisciplinaResource($disciplina);
        }
    }

    /**
     * Display a Disciplina.
     *
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $disciplina = Disciplina::findOrFail($id);
            $disciplina->delete();

            return response()->json(['success'], 200);
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
