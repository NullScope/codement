<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

use App\User;
use App\Aluno;
use App\Http\Resources\AlunoResource;

/**
 * @group Aluno management
 *
 * APIs for managing Alunos
 */
class AlunoController extends Controller
{
    /**
     * Display all Alunos.
     *
     * @apiResourceCollection App\Http\Resources\AlunoResource
     * @apiResourceModel App\Aluno
     * @responseFile responses/alunos.index.json
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlunoResource::collection(Aluno::all());
    }

    /**
     * Create a Aluno and the associated user.
     *
     * @apiResource App\Http\Resources\AlunoResource
     * @apiResourceModel App\Aluno
     * @bodyParam aluno_id string required
     * @bodyParam curso string required
     * @bodyParam data_de_matricula_inicial date required
     * @bodyParam ano_curricular int required
     * @bodyParam name string required
     * @bodyParam email string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     * @responseFile responses/alunos.get.json
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aluno_id' => ['required', 'string', 'max:255'],
            'curso' => ['required', 'string', 'max:255'],
            'data_de_matricula_inicial' => ['required', 'date'],
            'ano_curricular' => ['required', 'int'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        } else {
            $aluno = Aluno::create([
                'aluno_id' => $request->input('aluno_id'),
                'curso' => $request->input('curso'),
                'data_de_matricula_inicial' => $request->input('data_de_matricula_inicial'),
                'ano_curricular' => $request->input('ano_curricular'),
            ]);

            $aluno->user()->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);

            return new AlunoResource($aluno);
        }
    }

    /**
     * Display a Aluno.
     *
     * @apiResource App\Http\Resources\AlunoResource
     * @apiResourceModel App\Aluno
     * @urlParam aluno required Example: 1
     * @responseFile responses/alunos.get.json
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new AlunoResource(Aluno::findOrFail($id));
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'aluno_id_not_found',
            ));
        }
    }

    /**
     * Update a Aluno.
     *
     * @apiResource App\Http\Resources\AlunoResource
     * @apiResourceModel App\Aluno
     * @urlParam aluno required Example: 1
     * @responseFile responses/alunos.get.json
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $aluno = Aluno::findOrFail($id);
            $aluno->update($request->all());

            $aluno->user->update($request->all());

            return new AlunoResource($aluno);
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'aluno_id_not_found',
            ));
        }
    }

    /**
     * Remove a Aluno.
     *
     * @apiResource App\Http\Resources\AlunoResource
     * @apiResourceModel App\Aluno
     * @urlParam aluno required Example: 1
     * @response {
     *  "error": false,
     *  "status_code": 200,
     *  "response": "aluno_destroyed"
     * }
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $aluno = Aluno::findOrFail($id);
            $aluno->user->delete();
            $aluno->delete();

            /* Return Success Response */
            return response()->json(array(
                'error' => false,
                'status_code' => 200,
                'response' => 'aluno_destroyed',
            ));
        } catch (ModelNotFoundException $e) {
            /* Return Error Response */
            return response()->json(array(
                'error' => true,
                'status_code' => 404,
                'response' => 'aluno_id_not_found',
            ));
        }
    }
}
