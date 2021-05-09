<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_medications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('donation_process_id')->unsigned();
            $table->foreign('donation_process_id')->references('id')->on('donation_processes');
            $table->bigInteger('medicine_id')->unsigned();
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->Integer('quantity');
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
        Schema::dropIfExists('donation_medications');
    }
}
