<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Disciplina;
use App\EventoDeAvaliacao;
use App\Resolucao;
use App\Http\Resources\ResolucaoResource;

/**
 * @group Resolução management
 *
 * APIs for managing Resolucões
 */
class ResolucaoController extends Controller
{
    /**
     * Display all Resolucões of Evento de Resolução.
     *
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @return \Illuminate\Http\Response
     */
    public function index($disciplina_id, $evento_de_avaliacao_id)
    {
        try {
            return ResolucaoResource::collection(Disciplina::findOrFail($disciplina_id)->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao_id)->resolucoes);
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
     * Create a Resolução of Evento de Resolução.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplina_id, $evento_de_avaliacao_id)
    {
        try {
            $evento_de_avaliacao = Disciplina::findOrFail($disciplina_id)->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao_id);

            $resolucao = Resolucao::create([
                'evento_de_avaliacao_id' => $evento_de_avaliacao_id,
                'aluno_id' => auth()->user()->userable->id,
            ]);

            $evento_de_avaliacao->resolucoes()->attach($resolucao);

            return new ResolucaoResource($resolucao);
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
     * Display a Resolução of Evento de Resolução.
     *
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @return \Illuminate\Http\Response
     */
    public function show($disciplina_id, $evento_de_avaliacao_id, $resolucao_id)
    {
        try {
            $evento_de_avaliacao = Disciplina::findOrFail($disciplina_id)->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao_id);
            return new ResolucaoResource($evento_de_avaliacao->resolucoes()->findOrFail($resolucao_id));
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
     * Update a Resolução of Evento de Resolução.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplina_id, $evento_de_avaliacao_id, $resolucao_id)
    {
        try {
            $evento_de_avaliacao = Disciplina::findOrFail($disciplina_id)->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao);
            $resolucao = $evento_de_avaliacao->resolucoes()->findOrFail($resolucao_id);
            $resolucao->update($request->all());

            return new ResolucaoResource($resolucao);
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
     * Remove a Resolução of Evento de Resolução.
     *
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplina_id, $evento_de_avaliacao_id, $resolucao_id)
    {
        try {
            $evento_de_avaliacao = Disciplina::findOrFail($disciplina_id)->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao);
            $resolucao = $evento_de_avaliacao->resolucoes()->findOrFail($resolucao_id);
            $resolucao->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'resolucao_removed',
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
