<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class RailcarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'area'              => $this->area,
            'nice_area'         => $this->nice_area,
            'arrival_date'      => $this->arrival_date,
            'nice_arrival_date' => $this->nice_arrival_date,
            'due_date'          => $this->due_date,
            'nice_due_date'     => $this->nice_due_date,
            'status'            => $this->status,
            'nice_status'       => $this->nice_status
        ];
    }
}
