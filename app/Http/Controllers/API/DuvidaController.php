<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Disciplina;
use App\Duvida;
use App\Http\Resources\DuvidaResource;

/**
 * @group Duvida management
 *
 * APIs for managing Disciplinas
 */
class DuvidaController extends Controller
{
    /**
     * Display all Duvidas of Disciplina.
     *
     * @param int $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function index($disciplina_id)
    {
        try {
            return DuvidaResource::collection(Disciplina::findOrFail($disciplina_id)->duvidas);
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
     * Create a Duvida of Disciplina.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $disciplina_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplina_id)
    {
        $disciplina = Disciplina::findOrFail($disciplina_id);

        $duvida = Duvida::create([
            'aluno_id' => auth()->user()->userable->id,
            'disciplina_id' => $disciplina_id
        ]);

        $disciplina->duvidas()->attach($duvida);

        return new DuvidaResource($duvida);
    }

    /**
     * Display a Duvida of Disciplina.
     *
     * @param int $disciplina_id
     * @param int $duvida_id
     * @return \Illuminate\Http\Response
     */
    public function show($disciplina_id, $duvida_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            return new DuvidaResource($disciplina->duvidas()->findOrFail($duvida_id));
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
     * Update a Duvida of Disciplina.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $disciplina_id
     * @param int $duvida_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplina_id, $duvida_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            $duvida = $disciplina->duvidas()->findOrFail($duvida_id);
            $duvida->update($request->all());

            return new DuvidaResource($duvida);
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
     * Remove a Duvida of Disciplina.
     *
     * @param int $disciplina_id
     * @param int $duvida_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplina_id, $duvida_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            $duvida = $disciplina->duvidas()->findOrFail($duvida_id);
            $duvida->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'duvida_destroyed',
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
