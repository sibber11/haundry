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
            $table->string('name');
            $table->integer('points');
            $table->integer('price');
            $table->boolean('active')->default(true);

        });
        Schema::create('customer_package', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Customer::class);
            $table->foreignIdFor(\App\Models\Package::class);
            $table->dateTime('activated_at')->default(now());
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
