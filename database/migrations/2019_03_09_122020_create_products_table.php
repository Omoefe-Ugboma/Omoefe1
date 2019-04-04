<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_title');
            $table->integer('quantity');
            $table->string('brand')->nullable();
            $table->integer('product_price');
            $table->string('Product_Status')->default(0);
            $table->string('product_color');
            $table->boolean('image_has_variant')->nullable();
            $table->string('color_variant')->nullable();
            $table->string('Key_features',1000);
            $table->string('product_Description',1000);
            $table->string('product_type')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_Dimension');
            $table->string('product_Warranty')->default(0)->nullable();
            $table->string('product_SKU');
            $table->string('product_GTIN');
            $table->string('product_Weight')->default(0)->nullable();
            $table->string('product_Country')->nullable();
            $table->string('product_tags')->nullable();
            $table->integer('stock');
             
            $table->string('brand_id')->nullable();
            $table->integer('sub_category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('seller_id')->unsigned();

            $table->integer('shop_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('seller_id')->references('id')->on('users');
      
           // $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users');

            //$table->foreign('brand_id')->references('id')->on('brands');

            //$table->foreign('seller_id')->references('id')->on('stores');

            
         //ALTER TABLE products ADD CONSTRAINT fk_subcategory_id FOREIGN KEY (product_category) REFERENCES sub_categories(id);

         /*  Schema::table('products', function($table) {
        $table->foreign('product_category')->references('id')->on('sub_categories');
      
       */
      });
 
            
            
            
            
             
            
            
            
            
            
            
            


 
            //$table->integer('stock');

            // $table->string('Vendor');
            // $table->string('User_Manual');
            // $table->timestamps();
            // $table->softDeletes();
            //$table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');

    }

            
            
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
