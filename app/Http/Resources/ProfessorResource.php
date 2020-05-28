<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessorResource extends JsonResource
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
            'professor_id' => $this->professor_id,
            'user' => $this->user,
            'disciplinas' => $this->user->disciplinas,
            'regente' => $this->regente,
            'comentarios' => $this->user->comentarios,
            'ficheiros' => $this->user->ficheiros,
            'aulas' => $this->aulas,
            'eventos_de_avaliacao' => $this->user->eventosDeAvaliacao,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
