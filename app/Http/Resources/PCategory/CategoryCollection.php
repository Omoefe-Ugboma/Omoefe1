<?php

namespace App\Http\Resources\PCategory;

use Illuminate\Http\Resources\Json\Resource;

class CategoryCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
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
             
             'href' => [
             'Details' =>route('categories.show',$this->id)

              ]
        ];
    }
}
