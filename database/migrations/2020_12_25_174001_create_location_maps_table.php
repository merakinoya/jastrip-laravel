<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_maps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();

            $table->text('desc')->nullable();


            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();

            //$table->float('lat', 10, 6)->nullable();
            //$table->float('lng', 10, 6)->nullable();

            $table->string('type')->nullable();
            $table->string('url_google')->nullable();
            
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
        Schema::dropIfExists('location_maps');
    }
}
