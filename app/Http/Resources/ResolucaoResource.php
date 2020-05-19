<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResolucaoResource extends JsonResource
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
            'evento_de_avaliacao' => $this->eventoDeAvaliacao,
            'nota' => $this->nota,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
