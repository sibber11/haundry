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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Customer::class);
            $table->integer('total')->default(0);
        });

        Schema::create('log_point', function (Blueprint $table) {
            $table->integer('amount');
            $table->foreignIdFor(\App\Models\Point::class);
            $table->foreignIdFor(\App\Models\Log::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
};
