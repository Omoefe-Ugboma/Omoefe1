<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = [
           'product_Name','quantity','product_price','Product_Status','product_image_1','product_image_2','product_image_3','product_image_4','short_description','long_description','product_size','product_color','product_tags','stock','product_category','Vendor','User_Manual'
	];
    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }

    public function subcategory()
    {
    	return $this->belongsTo(SubCategory::class);
    }
}
 
 
