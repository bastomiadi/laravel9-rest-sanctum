<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => (new ProductResource($this->whenLoaded('product'))),
            'review' => $this->review,            
            'body' => $this->review,
            'star' => $this->star,
            'created_by' => (new UserResource($this->whenLoaded('user'))),
       ];
    }
}
