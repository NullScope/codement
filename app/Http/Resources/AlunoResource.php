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
            'profile' => $this->user,
            'disciplinas' => $this->user->disciplinas,
            'comentarios' => $this->user->comentarios,
            'ficheiros' => $this->user->ficheiros,
            'duvidas' => $this->duvidas,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
