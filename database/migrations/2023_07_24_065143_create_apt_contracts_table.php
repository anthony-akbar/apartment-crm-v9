<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAptContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apt_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apt_id');
            $table->unsignedBigInteger('client_id');
            $table->string('currency')->default('USD');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('paid');
            $table->unsignedBigInteger('debt');
            $table->unsignedBigInteger('days_missed')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /*$table->index('client_id', 'apt_client_idx');
            $table->foreign('client_id', 'apt_client_fk')->on('clients')->references('id');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apt_contracts');
    }
}
