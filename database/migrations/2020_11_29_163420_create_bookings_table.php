<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('userprofile_id')->unsigned()->nullable();
            $table->foreign('userprofile_id')->references('id')->on('user_profiles')->onDelete('cascade');


            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

  
            $table->dateTime('checkin_date', 0)->nullable();
            $table->integer('participant_amount')->nullable();
            $table->text('notes')->nullable();



            $table->decimal('price_amount', 32, 0)->nullable();
            $table->dateTime('expired_at', 0)->nullable();


            $table->string('receipt')->nullable();
            $table->dateTime('paid_at', 0)->nullable();


            $table->text('reason')->nullable();
            $table->dateTime('canceled_at', 0)->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
