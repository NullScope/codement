<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\AlunoResource;
use App\Http\Resources\DisciplinaResource;
use App\Http\Resources\FicheiroResource;

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
            'aluno' => new AlunoResource($this->aluno),
            'disciplina' => new DisciplinaResource($this->disciplina),
            'ficheiros' => FicheiroResource::collection($this->ficheiros),
            'descricao' => $this->descricao,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
