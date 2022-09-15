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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Customer::class);
//            $table->boolean('package_used')->default(false);
            $table->integer('sub_total');
            $table->foreignIdFor(\App\Models\Voucher::class)->nullable();
            $table->integer('total');
            $table->dateTime('deadline');
            $table->enum('status', [
                'placed',
                'confirmed',
                'onpickup',
                'picked',
                'onoperation',
                'operated',
                'ondelivery',
                'delivered',
            ]);
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
        Schema::dropIfExists('orders');
    }
};
