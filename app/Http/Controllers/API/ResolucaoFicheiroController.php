<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Disciplina;
use App\EventoDeAvaliacao;
use App\Resolucao;
use App\Ficheiro;
use App\Http\Resources\FicheiroResource;

/**
 * @group Resolução management
 *
 * APIs for managing Resolucões
 */
class ResolucaoFicheiroController extends Controller
{
    /**
     * Display all Ficheiros of Resolucões.
     *
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @return \Illuminate\Http\Response
     */
    public function index($disciplina_id, $evento_de_avaliacao_id, $resolucao_id)
    {
        try {
            return FicheiroResource::collection(
                Disciplina::findOrFail($disciplina_id)
                    ->eventosDeAvaliacao()->findOrFail($evento_de_avaliacao_id)
                    ->resolucoes()->findOrFail($resolucao_id)
                    ->ficheiros
            );
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
     * Create a Ficheiro of Resolução.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $disciplina_id, $evento_de_avaliacao_id, $resolucao_id)
    {
        try {
            $resolucao = Disciplina::findOrFail($disciplina_id)
                ->eventosDeAvaliacao()
                ->findOrFail($evento_de_avaliacao_id)
                ->resolucoes()
                ->findOrFail($resolucao_id);

            $validator = Validator::make($request->all(), [
                'nome' => ['required', 'string'],
                'descricao' => ['required', 'string'],
                'ficheiro' => ['required', 'file']
            ]);

            $file = $request->ficheiro;
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $extension = array_pop($explode);

            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $path = $file->store('files', 'public_uploads');

                $ficheiro = Ficheiro::create([
                    'user_id' => auth()->user()->id,
                    'nome' => $request->input('nome'),
                    'descricao' => $request->input('descricao'),
                    'extensao' => $extension,
                    'url' => env('APP_URL').'/uploads/'.$path
                ]);

                $resolucao->ficheiros()->save($ficheiro);

                return new FicheiroResource($ficheiro);
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
     * Display a Ficheiro of Resolução.
     *
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function show($disciplina_id, $evento_de_avaliacao_id, $resolucao_id, $ficheiro_id)
    {
        try {
            $resolucao = Disciplina::findOrFail($disciplina_id)
                ->eventosDeAvaliacao()
                ->findOrFail($evento_de_avaliacao_id)
                ->resolucoes()
                ->findOrFail($resolucao_id);
            return new FicheiroResource($resolucao->ficheiros()->findOrFail($ficheiro_id));
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
     * Update a Ficheiro of Resolução.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $disciplina_id, $evento_de_avaliacao_id, $resolucao_id, $ficheiro_id)
    {
        try {
            $resolucao = Disciplina::findOrFail($disciplina_id)
                ->eventosDeAvaliacao()
                ->findOrFail($evento_de_avaliacao_id)
                ->resolucoes()
                ->findOrFail($resolucao_id);
            $ficheiro = $resolucao->ficheiros()->findOrFail($ficheiro_id);
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
     * Remove a Ficheiro of Resolução.
     *
     * @param  int  $disciplina_id
     * @param  int  $evento_de_avaliacao_id
     * @param  int  $resolucao_id
     * @param  int  $ficheiro_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($disciplina_id, $evento_de_avaliacao_id, $resolucao_id, $ficheiro_id)
    {
        try {
            $resolucao = Disciplina::findOrFail($disciplina_id)
                ->eventosDeAvaliacao()
                ->findOrFail($evento_de_avaliacao_id)
                ->resolucoes()
                ->findOrFail($resolucao_id);
            $ficheiro = $resolucao->ficheiros()->findOrFail($ficheiro_id);
            $ficheiro->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'ficheiro_removed',
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
