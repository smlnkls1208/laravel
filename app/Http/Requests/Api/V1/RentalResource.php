<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'book' => new BookResource($this->whenLoaded('book')),
            'rented_at' => $this->rented_at?->toIso8601String(),
            'returned_at' => $this->returned_at?->toIso8601String(),
        ];
    }
}
