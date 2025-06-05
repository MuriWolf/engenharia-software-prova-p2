<?php

namespace App\Http\Resources;

use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroDetalhesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'sinopse' => $this->sinopse,
            'autor_id' => $this->autor_id,
            'genero_id' => $this->genero_id,
            'genero' => new GeneroResource($this->genero),
            'autor' => new AutorResource($this->autor),
            'review' => ReviewResource::collection($this->review)
        ];
    }
}

