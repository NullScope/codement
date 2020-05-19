<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DuvidaResource extends JsonResource
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
            'aluno' => $this->aluno,
            'disciplina' => $this->disciplina,
            'ficheiros' => $this->ficheiros,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
