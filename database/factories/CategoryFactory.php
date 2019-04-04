<?php

use Faker\Generator as Faker;
use App\ModelCat\SubCategory;
$factory->define(\App\Model\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'image' => $faker->image('public/CatImage/images',400,300, null, false),
    ];
});