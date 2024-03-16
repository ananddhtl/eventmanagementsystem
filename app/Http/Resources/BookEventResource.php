<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookEventResource extends JsonResource
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
            'user_id' => $this->user_id,
            'transaction_code' => $this->transaction_code,
            'event_id' => $this->event_id, 
            'qty' => $this->qty,
            'ticket_type' => $this->ticket_type,
            'total_price' => $this->total_price,
        ];
        
    }
}
