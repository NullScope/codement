<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventoDeAvaliacaoResource::collection(EventoDeAvaliacao::all());
    }

    /**
     * Create an Evento de Avaliação.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'disciplina_id' => ['required', 'string', 'max:255'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $eventoDeAvaliacao = EventoDeAvaliacao::create([
                'disciplina_id' => $request->input('disciplina_id'),
                'data_inicio' => $request->input('data_inicio'),
                'data_fim' => $request->input('data_fim'),
            ]);

            return new EventoDeAvaliacaoResource($eventoDeAvaliacao);
        }
    }

    /**
     * Display an Evento de Avaliação.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new EventoDeAvaliacaoResource(EventoDeAvaliacao::findOrFail($id));
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
     * Update an Evento de Avaliação.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $eventoDeAvaliacao = EventoDeAvaliacao::findOrFail($id);
            $eventoDeAvaliacao->update($request->all());

            return new EventoDeAvaliacaoResource($eventoDeAvaliacao);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $eventoDeAvaliacao = EventoDeAvaliacao::findOrFail($id);
            $eventoDeAvaliacao->delete();

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
