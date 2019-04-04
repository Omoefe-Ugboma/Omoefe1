<?php

namespace App\ModelCat;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
use App\ModelCat\SubCategory;

class SubCategory extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description'
    ];


    public function products()
     {
     	return $this->hasMany(Product::class);
     }

      public function categories()
     {
     	return $this->belongsTo(Category::class);
     }
}
