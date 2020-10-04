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
            $table->integer('user_id')->unsigned();
            $table->integer('userprofile_id')->unsigned()->nullable();

            $table->string('name');
            $table->longText('description')->nullable();
            $table->decimal('price', 16, 0)->nullable();
            $table->integer('total_participant')->nullable();

            $table->dateTime('start_at')->nullable();
            $table->dateTime('finish_at')->nullable();


            $table->string('meet_point')->nullable();
            $table->longText('facility')->nullable();
            $table->longText('terms_condition')->nullable();

            $table->string('img')->nullable();

            $table->timestamps();
            $table->softDeletes();

            /* Relation Table */
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('userprofile_id')->references('id')->on('user_profiles')->onDelete('cascade');
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
