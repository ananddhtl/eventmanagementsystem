<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'event_title' => $this->event_title,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail, 
            'event_date' => $this->event_date,
            'event_time' => $this->event_time,
            'organizer_id' => $this->organizer_id,
            'total_seats' => $this->total_seats, 
            'total_vip_seats' => $this->total_vip_seats, 
            'total_public_seats' => $this->total_public_seats, 
            'total_available_vip_seats' => $this->total_available_vip_seats, 
            'total_available_public_seats' => $this->total_available_public_seats, 
            'vip_seats_price' => $this->vip_seats_price,
            'public_seats_price' => $this->public_seats_price,
            'location' => $this->location,
        ];
        
    }
}
