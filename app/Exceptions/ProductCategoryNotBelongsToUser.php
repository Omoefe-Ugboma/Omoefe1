<?php

namespace App\Exceptions;

use Exception;

class ProductCategoryNotBelongsToUser extends Exception
{
    public function render()
    {
    	return ['error' => 'Product Category Not Belongs to user'];
    }
}
