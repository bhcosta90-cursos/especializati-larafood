<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'image' => $this->image ? url("storage/{$this->image}") : null,
            'id' => $this->id,
            'price' => $this->price,
            'flag' => $this->flag,
            'description' => $this->description,
            'categories' => $this->categories,
            'date_created' => now()::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
