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
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


            $table->string('product_name')->nullable(); 
            $table->integer('product_quality')->nullable(); 
            $table->float('product_price')->nullable(); 
            $table->string('product_img')->nullable(); 
            $table->text('product_decribe')->nullable(); 
            $table->integer('product_discount');
            $table->string('product_unitprice'); 
            $table->integer('product_tax')->nullable(); 
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
        Schema::dropIfExists('products');
    }
}
