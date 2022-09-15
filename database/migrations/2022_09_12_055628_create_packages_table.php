<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Service::class);
            $table->string('name');
            $table->tinyInteger('total_piece');
            $table->integer('regular_price');
            $table->integer('price');
            $table->integer('save');
            $table->tinyInteger('duration');
            $table->timestamps();
        });
        Schema::create('customer_package', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Customer::class);
            $table->foreignIdFor(\App\Models\Package::class);
            $table->date('start_date');
            $table->date('end_date');
//            $table->integer('used');
            $table->integer('remaining');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
