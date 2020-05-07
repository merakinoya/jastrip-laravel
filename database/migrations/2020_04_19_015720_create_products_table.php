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
            $table->increments('id');

            /* Custom Column */
            $table->integer('seller_id')->unsigned();

            $table->string('name');

            $table->string('facility');

            $table->dateTime('start_at');
            $table->dateTime('finish_at');
            $table->decimal('price', 13, 0);

            $table->timestamps();

            /* Relation Table */
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** To drop an existing table, you may use the drop or dropIfExists methods: */
        
        Schema::dropIfExists('products');
    }
}
