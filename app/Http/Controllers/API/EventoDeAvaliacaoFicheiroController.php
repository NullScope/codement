<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\EventoDeAvaliacao;
use App\Ficheiro;
use App\Http\Resources\FicheiroResource;

/**
 * @group Eventos de Avaliação management
 *
 * APIs for managing Eventos de Avaliação
 */
class EventoDeAvaliacaoFicheiroController extends Controller
{
    /**
     * Display all Ficheiros of Evento de Avaliação.
     *
     * @param  int  $evento_de_avaliacao_id
     * @return \Illuminate\Http\Response
     */
    public function index($evento_de_avaliacao_id)
    {
        try {
            return FicheiroResource::collection(EventoDeAvaliacao::findOrFail($evento_de_avaliacao_id)->ficheiros);
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
     * Create a Ficheiro of Evento de Avaliação.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $evento_de_avaliacao_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $evento_de_avaliacao_id)
    {
        try {
            $evento_de_avaliacao = EventoDeAvaliacao::findOrFail($evento_de_avaliacao_id);
            $ficheiro = Ficheiro::create($request->all());

            $evento_de_avaliacao->ficheiros()->save($ficheiro);

            return new FicheiroResource($aula);
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
     * Display a Ficheiro of Evento de Avaliação.
     *
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function show($evento_de_avaliacao_id, $ficheiro_id)
    {
        try {
            $evento_de_avaliacao = EventoDeAvaliacao::findOrFail($evento_de_avaliacao_id);
            return new FicheiroResource($evento_de_avaliacao->ficheiros()->findOrFail($ficheiro_id));
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
     * Update a Ficheiro of Evento de Avaliação.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $evento_de_avaliacao_id, $ficheiro_id)
    {
        try {
            $evento_de_avaliacao = EventoDeAvaliacao::findOrFail($evento_de_avaliacao_id);
            $ficheiro = $evento_de_avaliacao->ficheiros()->findOrFail($ficheiro_id);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($evento_de_avaliacao_id, $ficheiro_id)
    {
        try {
            $evento_de_avaliacao = EventoDeAvaliacao::findOrFail($evento_de_avaliacao_id);
            $ficheiro = $evento_de_avaliacao->ficheiros()->findOrFail($ficheiro_id);
            $ficheiro->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'ficheiro_destroyed',
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
