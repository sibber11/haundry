<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('id');
            $table->text('name');
        });

        DB::table('services')->insert([
            ['name' => 'iron'],
            ['name' => 'wash & iron'],
            ['name' => 'dry clean'],
            ['name' => 'wash & fold'],
        ]);

        Schema::create('laundry_type_service', function (Blueprint $table) {
            $table->foreignId('laundry_type_id');
            $table->foreignId('service_id');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('services');
        Schema::drop('laundry_type_service');
    }
};

