<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComentarioResource extends JsonResource
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
            'user' => $this->user,
            'ficheiro' => $this->ficheiro,
            'comentario' => $this->comentario,
            'audio_url' => $this->audio_url,
            'linha_inicio' => $this->linha_inicio,
            'linha_fim' => $this->linha_fim,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
