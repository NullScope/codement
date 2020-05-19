<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventoDeAvaliacaoResource extends JsonResource
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
            'disciplina' => $this->disciplina,
            'resolucoes' => $this->resolucoes,
            'ficheiros' => $this->ficheiros,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
