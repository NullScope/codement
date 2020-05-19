<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Disciplina;
use App\EventoDeAvaliacao;
use App\Http\Resources\EventoDeAvaliacaoResource;

/**
 * @group Eventos de Avaliação management
 *
 * APIs for managing Eventos de Avaliação
 */
class EventoDeAvaliacaoController extends Controller
{
    /**
     * Display all Eventos de Avaliação.
     *
     * @apiResourceCollection App\Http\Resources\EventoDeAvaliacaoResource
     * @apiResourceModel App\EventoDeAvaliacao
     * @responseFile responses/EventosDeAvaliacao.index.json
     * @urlParam disciplina required Example: 1
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return EventoDeAvaliacaoResource::collection(Disciplina::findOrFail($disciplina_id)->eventosDeAvaliacao);
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
     * Create an Evento de Avaliação.
     *
     * @apiResource App\Http\Resources\EventoDeAvaliacaoResource
     * @apiResourceModel App\EventoDeAvaliacao
     * @responseFile responses/EventosDeAvaliacao.get.json
     * @bodyParam data_inicio date required
     * @bodyParam data_fim date required
     * @urlParam disciplina required Example: 1
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplina_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);

            $validator = Validator::make($request->all(), [
                'data_inicio' => ['required', 'date'],
                'data_fim' => ['required', 'date'],
            ]);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $eventoDeAvaliacao = EventoDeAvaliacao::create([
                    'disciplina_id' => $disciplina_id,
                    'data_inicio' => $request->input('data_inicio'),
                    'data_fim' => $request->input('data_fim'),
                ]);

                return new EventoDeAvaliacaoResource($eventoDeAvaliacao);
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
     * Display an Evento de Avaliação.
     *
     * @apiResource App\Http\Resources\EventoDeAvaliacaoResource
     * @apiResourceModel App\EventoDeAvaliacao
     * @responseFile responses/EventosDeAvaliacao.get.json
     * @urlParam disciplina required Example: 1
     * @urlParam eventos_de_avaliacao required Example: 1
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($disciplina_id, $evento_de_avaliacao_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            return new EventoDeAvaliacaoResource($disciplina->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao_id));
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
     * Update an Evento de Avaliação.
     *
     * @apiResource App\Http\Resources\EventoDeAvaliacaoResource
     * @apiResourceModel App\EventoDeAvaliacao
     * @responseFile responses/EventosDeAvaliacao.get.json
     * @urlParam disciplina required Example: 1
     * @urlParam eventos_de_avaliacao required Example: 1
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplina_id, $evento_de_avaliacao_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            $evento_de_avaliacao = $disciplina->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao_id);
            $evento_de_avaliacao->update($request->all());

            return new EventoDeAvaliacaoResource($evento_de_avaliacao);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'evento_de_avaliacao_id_not_found',
            ));
        }
    }

    /**
     * Remove an Evento de Avaliação.
     *
     * @apiResource App\Http\Resources\EventoDeAvaliacaoResource
     * @apiResourceModel App\EventoDeAvaliacao
     * @urlParam disciplina required Example: 1
     * @urlParam eventos_de_avaliacao required Example: 1
     * @response {
     *  "error": false,
     *  "status_code": 200,
     *  "response": "duvida_destroyed"
     * }
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplina_id, $eventos_de_avaliacao_id)
    {
        try {
            $disciplina = Disciplina::findOrFail($disciplina_id);
            $evento_de_avaliacao = $disciplina->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao_id);
            $evento_de_avaliacao->destroy();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'evento_destroyed',
            ));
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'evento_de_avaliacao_id_not_found',
            ));
        }
    }
}
