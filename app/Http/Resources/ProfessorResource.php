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
            'professor_id' => $this->aluno_id,
            'user' => $this->user,
            'disciplinas' => $this->user->disciplinas,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
