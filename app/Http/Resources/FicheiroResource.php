<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ComentarioResource;

class FicheiroResource extends JsonResource
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
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'url' => $this->url,
            'extensao' => $this->extensao,
            'comentarios' => ComentarioResource::collection($this->comentarios),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
