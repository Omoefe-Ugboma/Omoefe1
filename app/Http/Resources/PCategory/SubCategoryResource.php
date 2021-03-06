<?php

namespace App\Http\Resources\PCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
             'image'=> $this->image,
             'description'=> $this->description,

             // 'href' =>[
                  
             //      'Details' => route('products.index',$this->id)
             //  ]
        ];
    }
}
