<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Category;
use App\ModelCat\SubCategory;
use App\Model\Product;
//use App\Transaction;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             CategoryTableSeeder::class
         ]);

//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//
//        App\User::truncate();
//        App\ModelCat\Category::truncate();
//        App\ModelCat\SubCategory::truncate();
//        App\Model\Product::truncate();
//        DB::table('category_product')->truncate();
//
//
//        factory(App\User::class,5)->create();
//        factory(App\ModelCat\Category::class,3)->create();
//        factory(App\ModelCat\SubCategory::class,5)->create();
//        factory(App\Model\Product::class,5)->create();//->each(
        //     function ($product){
        //         $categories = SubCategory::all()->random(mt_rand(1, 5))->pluck('id');

        //         $product->product()->attach($categories);
        //     }

        // );
//        factory(App\Model\Review::class,7)->create();
    }
}




