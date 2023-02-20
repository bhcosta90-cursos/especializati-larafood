<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'image' => $this->logo ? url("storage/{$this->logo}") : null,
            'id' => $this->id,
            'flag' => $this->url,
            'contact' => $this->email,
            'date_created' => now()::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
