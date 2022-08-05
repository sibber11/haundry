<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
//            $table->json('location')->nullable();
            $table->foreignId('area_id')->nullable();
            //here we are storing longitude as int
            // actual_longitude * 10000 = upto_five_place_precision
            $table->mediumInteger('longitude');
            $table->mediumInteger('latitude');
            $table->string('info');
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
        Schema::dropIfExists('addresses');
    }
};
