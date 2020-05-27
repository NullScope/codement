<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\AlunoResource;
use App\Http\Resources\ProfessorResource;

class DisciplinaResource extends JsonResource
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
            'nome' => $this->nome,
            'alunos' => AlunoResource::collection($this->alunos),
            'regente' => new ProfessorResource($this->regente),
            'assistentes' => ProfessorResource::collection($this->assistentes),
            'semestre_curricular' => $this->semestre_curricular,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
