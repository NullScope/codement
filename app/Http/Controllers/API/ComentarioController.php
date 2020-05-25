<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Ficheiro;
use App\Comentario;
use App\Http\Resources\ComentarioResource;

/**
 * @group Comentario management
 *
 * APIs for managing Comentarios
 */
class ComentarioController extends Controller
{
    /**
     * Display all Comentarios of Ficheiro.
     *
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function index($ficheiro_id)
    {
        try {
            return ComentarioResource::collection(Ficheiro::findOrFail($ficheiro_id)->comentarios);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'ficheiro_id_not_found',
            ));
        }
    }

    /**
     * Create Comentario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ficheiro_id)
    {
        $validator = Validator::make($request->all(), [
            'comentario' => ['required_without:audio', 'nullable', 'string', 'max:255'],
            'linha_inicio' => ['required', 'int', 'max:255'],
            'linha_fim' => ['required', 'int', 'max:255'],
            'audio' => ['required_without:comentario', 'file']
        ]);

        $file = $request->audio;

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $ficheiro = Ficheiro::findOrFail($ficheiro_id);

            if ($file) {
                $path = $file->store('files', 'public_uploads');
                $url = env('APP_URL').'/uploads/'.$path;
            } else {
                $url = NULL;
            }

            $comentario = Comentario::create([
                'user_id' => auth()->user()->id,
                'ficheiro_id' => $ficheiro_id,
                'comentario' => $request->input('comentario'),
                'linha_inicio' => $request->input('linha_inicio'),
                'linha_fim' => $request->input('linha_fim'),
                'audio_url' => $url,
                'comentario_id' => $request->input('comentario_id')
            ]);

            $ficheiro->comentarios()->save($comentario);

            return new ComentarioResource($comentario);
        }
    }

    /**
     * Display a Comentario of Ficheiro.
     *
     * @param  int  $ficheiro_id
     * @param  int  $comentario_id
     * @return \Illuminate\Http\Response
     */
    public function show($ficheiro_id, $comentario_id)
    {
        try {
            $ficheiro = Ficheiro::findOrFail($ficheiro_id);
            return new FicheiroResource($ficheiro->comentarios()->findOrFail($comentario_id));
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
     * Update a Comentario of Ficheiro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ficheiro_id
     * @param  int  $comentario_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ficheiro_id, $comentario_id)
    {
        try {
            $ficheiro = Ficheiro::findOrFail($ficheiro_id);
            $comentario = $ficheiro->comentarios()->findOrFail($comentario_id);
            $comentario->update($request->all());

            return new ComentarioResource($comentario);
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
     * Remove a Comentario of Ficheiro.
     *
     * @param  int  $ficheiro_id
     * @param  int  $comentario_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ficheiro_id, $comentario_id)
    {
        try {
            $ficheiro = Ficheiro::findOrFail($ficheiro_id);
            $comentario = $ficheiro->comentarios()->findOrFail($comentario_id);
            $comentario->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'comentario_destroyed',
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
