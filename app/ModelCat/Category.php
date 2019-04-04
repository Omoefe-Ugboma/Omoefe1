<?php

namespace App\ModelCat;
use App\ModelCat\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'image',
    ];


     //  public function subcategory()
     //   {
    	// return $this->belongsToMany(SubCategory::class);
     //   }

      public function subcategories()
       {
    	return $this->hasMany(SubCategory::class);
       }
}
