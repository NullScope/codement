<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'url' => $this->url,
            'extensao' => $this->extensao,
            'comentarios' => $this->comentarios,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
