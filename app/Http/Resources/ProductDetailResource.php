<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(is_null($this->images)){
            return [
                'id' => $this->id,
                'category_id' => $this->category_id,
                'name' => $this->name,
                'slug' => $this->slug,
                'qty' => $this->qty,
                'price' => $this->price,
                'images' => '',
            ];
        }else{
            return [
                'id' => $this->id,
                'category_id' => $this->category_id,
                'name' => $this->name,
                'slug' => $this->slug,
                'qty' => $this->qty,
                'price' => $this->price,
                'images' => ImageResource::collection($this->images),
            ];
        }
    }
}
