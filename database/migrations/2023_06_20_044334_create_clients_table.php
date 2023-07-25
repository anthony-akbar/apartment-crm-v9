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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('name');
            $table->string('fathersname')->nullable();
            $table->string('gender');
            $table->date('birth');
            $table->string('passportId');
            $table->string('given');
            $table->date('givendate');
            $table->string('address');
            $table->string('phone');
            $table->string('status');
            $table->unsignedBigInteger('pin');
            $table->string('email')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
