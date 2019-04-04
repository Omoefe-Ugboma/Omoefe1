<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
              
            'product_Name' => $this->product_Name,
            'short_description'=> $this->short_description,
            'long_description'=> $this->long_description,
            'product_image_1' => $this->product_image_1,
            'product_image_2' => $this->product_image_2,
            'product_image_3' => $this->product_image_3,
            'product_image_4' => $this->product_image_4,
           'Product_Status' => $this->Product_Status,
           'quantity'=>$this->quantity,
           'product_price'=>$this->product_price,
           'product_tags'=> $this->product_tags,
           'product_size'=> $this->product_size,
           'product_category'=> $this->product_category,
           'stock'=>$this->stock == '0' ? 'Out of Stock' : $this->stock,
           'product_color'=> $this->product_color,
           'Vendor' => $this->Vendor,
           'User_Manual'=>$this->User_Manual,
           'rating' =>$this->reviews->count() > 0 ?round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet',

           'href' => [
             
              'reviews' => route('reviews.index',$this->id)             
           ]
        ];
    }
} 
         
          
