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
        Schema::create('commercials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('number');
            $table->unsignedBigInteger('floor')->default(1);
            $table->float('square', 8, 2);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->float('price');
            $table->float('total');
            $table->string('currency')->default('USD');
            $table->integer('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('commercials');
    }
};
