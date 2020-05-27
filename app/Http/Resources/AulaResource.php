<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\DisciplinaResource;
use App\Http\Resources\FicheiroResource;

class AulaResource extends JsonResource
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
            'descricao' => $this->descricao,
            'ficheiros' => FicheiroResource::collection($this->ficheiros),
            'disciplina' => new DisciplinaResource($this->disciplina),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
