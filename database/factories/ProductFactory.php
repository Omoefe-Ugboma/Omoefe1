<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'product_Name' => $faker->word,
          'short_description'=> $faker->paragraph,   
          'long_description'=> $faker->paragraph, 
          'product_image_1' => $faker->image('public/storage/images',400,300, null, false),
          'product_image_2' => $faker->image('public/storage/images',400,300, null, false),
          'product_image_3' => $faker->image('public/storage/images',400,300, null, false),
          'product_image_4' => $faker->image('public/storage/images',400,300, null, false),
          'Product_Status' => $faker->boolean($chanceOfGettingTrue = 90), 
          'quantity'=>$faker->numberBetween(1, 10), 
          'product_price'=> $faker->numberBetween(100,1000),
          'product_tags'=> $faker->word, 
          'product_size'=> $faker->numberBetween(10,100),
          /*'product_category'=> $faker->numberBetween(10,100),*/
          'stock'=>$faker->randomDigit,
          'product_color'=> $faker->word, 
          'Vendor' => $faker->name, 
          'User_Manual' =>$faker->word,
          'user_id' => \App\Model\User::all()->random()->id,
          //'discount'=>$faker->numberBetween(2,30)
       //    'user_id'=>function(){

       //       return App\User::all()->random();
       // },
    ];
});
