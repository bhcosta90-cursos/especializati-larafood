<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderEvaluationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'stars' => $this->stars,
            'comment' => $this->comment,
            'client' => new CustomerResource($this->customer),
            'order' => new OrderResource($this->order),
        ];
    }
}
