<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\AlunoResource;
use App\Http\Resources\ProfessorResource;

/**
 * @group Profile management
 *
 * APIs for getting the logged in user
 */
class ProfileController extends Controller
{
    /**
     * Display information about the logged in user.
     *
     * @responseFile responses/profile.index.json
     * @authenticated
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $user = auth()->user()->userable;

            if (is_a($user, "App\Aluno")) {
                return new AlunoResource($user);
            } else if (is_a($user, "App\Professor")) {
                return new ProfessorResource($user);
            } else {
                return response()->json(array(
                    'error' => true,
                    'status_code' => 404,
                    'response' => 'not_found',
                ));
            }
        } else {
            return response()->json(array(
                'error' => true,
                'status_code' => 401,
                'response' => 'not_authorized',
            ));
        }
    }

    /**
     * Store a newly created resource in storage (NOT IMPLEMENTED).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource (NOT IMPLEMENTED).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage (NOT IMPLEMENTED).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage (NOT IMPLEMENTED).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
