<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'category_name' => $this->category_name,
            'detail' => $this->detail,
            'products' => ProductResource::collection($this->whenLoaded('products')), //menampilkan banyak produk
            'user' => (new UserResource($this->whenLoaded('user'))),
        ];
    }
}
