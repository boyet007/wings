<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('product_code', 18);
            $table->string('product_name', 30);
            $table->double('price', 8, 2);
            $table->string('currency', 5);
            $table->smallInteger('discount')->nullable();
            $table->string('dimension', 50);
            $table->string('unit', 5);
            $table->primary('product_code');
        });
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
