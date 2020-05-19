<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

use App\User;
use App\Professor;
use App\Http\Resources\ProfessorResource;

/**
 * @group Professor management
 *
 * APIs for managing Professores
 */
class ProfessorController extends Controller
{
    /**
     * Display all Professores.
     *
     * @apiResourceCollection App\Http\Resources\ProfessorResource
     * @apiResourceModel App\Professor
     * @responseFile responses/professores.index.json
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfessorResource::collection(Professor::all());
    }

    /**
     * Create a Professor and the associated user.
     *
     * @apiResource App\Http\Resources\ProfessorResource
     * @apiResourceModel App\Professor
     * @bodyParam professor_id string required
     * @bodyParam name string required
     * @bodyParam email string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     * @responseFile responses/professores.get.json
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'professor_id' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $professor = Professor::create([
                'professor_id' => $request->input('professor_id')
            ]);

            $professor->user()->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);

            return new ProfessorResource($professor);
        }
    }

    /**
     * Display a Professor.
     *
     * @apiResource App\Http\Resources\ProfessorResource
     * @apiResourceModel App\Professor
     * @urlParam professor required Example: 1
     * @responseFile responses/professores.get.json
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new ProfessorResource(Professor::findOrFail($id));
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'professor_id_not_found',
            ));
        }
    }

    /**
     * Update a Professor.
     *
     * @apiResource App\Http\Resources\ProfessorResource
     * @apiResourceModel App\Professor
     * @urlParam professor required Example: 1
     * @responseFile responses/professores.get.json
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $professor = Professor::findOrFail($id);
            $professor->update($request->all());

            $professor->user->update($request->all());

            return new ProfessorResource($professor);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'professor_id_not_found',
            ));
        }
    }

    /**
     * Remove a Professor.
     *
     * @apiResource App\Http\Resources\ProfessorResource
     * @apiResourceModel App\Professor
     * @urlParam professor required Example: 1
     * @response {
     *  "error": false,
     *  "status_code": 200,
     *  "response": "professor_destroyed"
     * }
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $professor = Professor::findOrFail($id);
            $professor->user->delete();
            $professor->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'professor_destroyed',
            ));
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'professor_id_not_found',
            ));
        }
    }
}
