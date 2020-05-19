<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Ficheiro;
use App\Http\Resources\FicheiroResource;

/**
 * @group Ficheiro management
 *
 * APIs for managing Ficheiros
 */
class FicheiroController extends Controller
{
    /**
     * Display all Ficheiros.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FicheiroResource::collection(Ficheiro::all());
    }

    /**
     * Create a Ficheiro (NOT IMPLEMENTED).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display a Ficheiro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new FicheiroResource(Ficheiro::findOrFail($id));
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
     * Update a Ficheiro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $ficheiro = Ficheiro::findOrFail($id);
            $ficheiro->update($request->all());

            return new FicheiroResource($ficheiro);
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
     * Remove a Ficheiro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ficheiro = Ficheiro::findOrFail($id);
            $ficheiro->user->delete();
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
                'response' => 'ficheiro_id_not_found',
            ));
        }
    }
}
