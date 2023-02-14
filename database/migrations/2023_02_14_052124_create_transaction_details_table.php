<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->string('document_code', 3);
            $table->string('document_number', 10);
            $table->string('product_code', 18);
            $table->double('price', 8, 2);
            $table->integer('qty');
            $table->string('unit', 5);
            $table->double('sub_total', 10, 2);
            $table->string('currency', 5);
            $table->primary(['document_code', 'document_number', 'product_code'], 'primary_transaction_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
