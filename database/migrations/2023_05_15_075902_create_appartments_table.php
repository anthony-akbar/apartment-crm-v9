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
        Schema::create('appartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('number');
            $table->string('image');
            $table->unsignedBigInteger('rooms');
            $table->unsignedBigInteger('floor');
            $table->float('square', 10, 2);
            $table->string('block');
            $table->float('price', 10, 2);
            $table->float('total', 10, 2);
            $table->string('currency')->default('USD');
            $table->string('status');
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
        Schema::dropIfExists('appartments');
    }
};
