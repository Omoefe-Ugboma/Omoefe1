<?php

namespace App\Model;
 use Illuminate\Database\Eloquent\Model;

 class Category extends Model
 {
     protected $fillable = [
         'name',
         'description',
         'image',
     ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
