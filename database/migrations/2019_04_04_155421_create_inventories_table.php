<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Product')->nullable();
            $table->string('SKU')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('Product_status')->nullable();
            $table->string('Edit_Quantity')->nullable();
            $table->string('Product_warranty')->nullable();
            $table->string('GTIN')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
