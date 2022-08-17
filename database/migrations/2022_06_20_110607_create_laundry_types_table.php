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
        Schema::create('laundry_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('name');
            // $table->integer('wash_price')->nullable();
            // $table->integer('dry_wash_price')->nullable();
            // $table->integer('iron_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laundry_types');
    }
};
