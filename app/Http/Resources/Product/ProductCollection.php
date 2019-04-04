<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
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

           'id' => $this->id,
           'product_Name' => $this->product_Name,
            'product_image_1' => $this->product_image_1,
           'Product_Status' => $this->Product_Status,
           'quantity'=>$this->quantity,
           'product_price'=>$this->product_price,

           'href' => [
             
              'link' => route('products.show',$this->id)             
           ]


        ];
    }
}
