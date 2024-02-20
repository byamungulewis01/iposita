<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopupTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topup_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('from_service_provider_id');
            $table->unsignedBigInteger('from_service_id');
            $table->unsignedBigInteger('to_service_provider_id');
            $table->unsignedBigInteger('to_service_id');
            $table->unsignedBigInteger('amount');

            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('from_service_provider_id')->references('id')->on('service_providers');
            $table->foreign('from_service_id')->references('id')->on('services');
            $table->foreign('to_service_provider_id')->references('id')->on('service_providers');
            $table->foreign('to_service_id')->references('id')->on('services');
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
        Schema::dropIfExists('topup_transfers');
    }
}
