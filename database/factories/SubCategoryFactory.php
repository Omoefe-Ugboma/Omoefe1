<?php

use Faker\Generator as Faker;
use App\Model\Product;
$factory->define(App\ModelCat\SubCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'image' => $faker->image('public/CatImage/images',400,300, null, false),
    ];
});
