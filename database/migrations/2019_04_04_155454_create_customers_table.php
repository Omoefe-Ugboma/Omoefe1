<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('First_name');
            $table->string('Last_name');
            $table->enum('Gender', array('Male', 'Female'));
            $table->string('Company')->unique();
            $table->date('Date_of_Birth');
            $table->string('Group')->unique();
            $table->string('Phone_number')->unique();
            $table->string('Email_Address')->unique();
            // $table->string('Country')->nullable();
            // $table->string('State')->nullable();
            // $table->string('City')->nullable();
            $table->string('Postal_Code')->nullable();
            $table->string('Residential_Address')->nullable();
            $table->string('Billing_Address')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}
