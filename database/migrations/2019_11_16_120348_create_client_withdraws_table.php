<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_withdraws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agentid')->nullable();
            $table->integer('clientid')->nullable();
            $table->integer('withdrawamount')->nullable();
            $table->integer('actualamount')->nullable();
            $table->integer('chargeamount')->nullable();
            $table->boolean('status')->default(0)->nullable();
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
        Schema::dropIfExists('client_withdraws');
    }
}
