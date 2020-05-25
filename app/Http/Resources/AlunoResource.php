<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'aluno_id' => $this->aluno_id,
            'user' => $this->user,
            'curso' => $this->curso,
            'data_de_matricula_inicial' => $this->data_de_matricula_inicial,
            'ano_curricular' => $this->ano_curricular,
            'disciplinas' => $this->user->disciplinas,
            'comentarios' => $this->user->comentarios,
            'ficheiros' => $this->user->ficheiros,
            'duvidas' => $this->duvidas,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
