<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

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

      public function category()
     {
     	return $this->belongsTo(Category::class);
     }
}

