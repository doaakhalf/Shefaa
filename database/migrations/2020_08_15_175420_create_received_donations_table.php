<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('received_donations', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->dateTime('date');
            $table->bigInteger('donation_process_id')->unsigned();
            $table->foreign('donation_process_id')->references('id')->on('donation_processes');
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
        Schema::dropIfExists('received_donations');
    }
}
