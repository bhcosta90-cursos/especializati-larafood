<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'identify' => $this->identify,
            'total' => $this->total,
            'status' => $this->status,
            'status_label' => $this->statusOptions[$this->status],
            'date_created' => now()->parse($this->created_at)->format('d/m/Y'),
            'company' => new CompanyResource($this->company),
            'customer' => $this->customer_id ? new CustomerResource($this->customer) : null,
            'table' => $this->table_id ? new TableResource($this->table) : null,
            'products' => ProductResource::collection($this->products)
        ];
    }
}
