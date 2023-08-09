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
        Schema::create('apt_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apt_id');
            $table->unsignedBigInteger('client_id');
            $table->integer('status');
            $table->date('until');
            $table->float('paid', 10, 2)->nullable();
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
        Schema::dropIfExists('apt_books');
    }
};
