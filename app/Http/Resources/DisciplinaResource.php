<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'alunos' => $this->alunos,
            'regente' => $this->regente,
            'assistentes' => $this->assistentes,
            'semestre_curricular' => $this->semestre_curricular,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
